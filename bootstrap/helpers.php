<?php

if ( ! function_exists('cartrabbit'))
{
    /**
     * Gets the cartrabbit container.
     *
     * @param  string $binding
     * @return string
     */
    function cartrabbit($binding = null)
    {
        $instance = Cartrabbit\Framework\Application::getInstance();

        if ( ! $binding)
        {
            return $instance;
        }

        return $instance[$binding];
    }
}

if ( ! function_exists('session'))
{
    /**
     * Gets the session or a key from the session.
     *
     * @param  string $key
     * @param  mixed  $default
     * @return \Illuminate\Session\Store|mixed
     */
    function session($key = null, $default = null)
    {
        if ($key === null)
        {
            return cartrabbit('session');
        }

        return cartrabbit('session')->get($key, $default);
    }
}

if ( ! function_exists('session_flashed'))
{
    /**
     * Gets the session flashbag or a key from the session flashbag.
     *
     * @param  string $key
     * @param  mixed  $default
     * @return \Illuminate\Session\Store|mixed
     */
    function session_flashed($key = null, $default = [])
    {
        if ($key === null)
        {
            return cartrabbit('session')->getFlashBag();
        }

        return cartrabbit('session')->getFlashBag()->get($key, $default);
    }
}

require( dirname( __FILE__ ) . '/plugin.php' );