<?php
namespace App\Services;

/**
*  vendor\illuminate\view\View.php
*/
class View
{
	
	/**
     * The name of the view.
     *
     * @var string
     */
    public $view;

    /**
     * The array of view data.
     *
     * @var array
     */
    public $data;

    /**
     * The path to the view file.
     *
     * @var string
     */
    // protected $path;

	function __construct($view)
	{
		$this->view = $view;
	}

	/**
	 *  add a piece of data to the view.
	 *
	 *  @param  string|array  $key 
	 *  @param  mixed         $value
	 *  @return $this
	 */

	public function with($key, $value = null)
	{
		if (is_array($key)) {
			$this->data = array_merge($this->data, $key);
		} else {
			$this->data[$key] = $value;
		}
		return $this;

	}

	public static function make($view = null)
	{
		if (!$view) 
			throw new InvalidArgumentException("view不能为空");
		
		$viewFile = self::getPath() . '/' . $view . '.php';
		if (is_file($viewFile)) {
			return new View($viewFile);
		} else {
			throw new UnexpectedValueException($viewFile . "文件不存在", 404);
		}
	}

	/**
     * Get the path to the view file.
     *
     * @return string
     */
	public static function getPath()
	{
		return VIEW_DIR; 
	}

	/**
     * Set the path to the view.
     *
     * @param  string  $path
     * @return void
     */
	// public function setPath($path)
	// {
	// 	$this->path = $path;
	// }

	/**
     * Get a piece of data from the view.
     *
     * @param  string  $key
     * @return mixed
     */
	public function &__get($key)
	{
		return $this->data[$key];
	}

	/**
     * Set a piece of data on the view.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
	public function __set($key, $value)
	{
		$this->with($key, $value);
	}

	/**
     * Check if a piece of data is bound to the view.
     *
     * @param  string  $key
     * @return bool
     */
	public function __isset($key)
	{
		return isset($key);
	}

	/**
     * Remove a piece of bound data from the view.
     *
     * @param  string  $key
     * @return bool
     */
	public function __unset($key)
	{
		unset($this->data[$key]);
	}

	/**
     * Dynamically bind parameters to the view.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return \Illuminate\View\View
     *
     * @throws \BadMethodCallException
     */
	public function __call($method, $parameters)
	{
		if (starts_with($method, 'with')) {
            return $this->with(snake_case(substr($method, 4)), $parameters[0]);
        }

        throw new BadMethodCallException("Method [$method] does not exist on view.");
	}


}