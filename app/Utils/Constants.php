<?php
/**
 *
 * User: YuGang Yang
 * Date: 10/26/15
 * Time: 16:35
 */

namespace App\Utils;


class Constants
{

	/**
	 * Get the page parameter key
	 * @return mixed
	 */
	public static function getParameterKeyPage()
	{
		return config('consts.REQUEST_PARAMETER_PAGE');
	}

	/**
	 * Get the page size parameter key
	 * @return mixed
	 */
	public static function getParameterKeyPageSize()
	{
		return config('consts.REQUEST_PARAMETER_PAGE_SIZE');
	}

	/**
	 * Get the default page
	 * @return mixed
	 */
	public static function getDefaultPage()
	{
		return config('consts.paginator_default_page');
	}

	/**
	 * get the default page size
	 * @return mixed
	 */
	public static function getDefaultPageSize()
	{
		return config('consts.paginator_default_page_size');
	}

}