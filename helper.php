<?php
/**
 * Helper class for Hello World! module
 */
class ModHelloWorldHelper {
	/**
	 * Retrieves the hello message
	 *
	 * @param   array  $params An object containing the module parameters
	 *
	 * @access public
	 */
	public static function getHello($params) {
		// Get the language id
		$lang = $params->get('lang', '1');
		
		// Obtain a database connection
		$db = JFactory::getDbo();
		
		// Retrieve the shout - note we are now retrieving the id not the lang field.
		$query = $db -> getQuery(true) -> select($db -> quoteName('hello')) -> from($db -> quoteName('#__helloworld')) -> where('id = ' . $db -> Quote($lang));
		
		// Prepare the query
		$db -> setQuery($query);
		
		// Load the row.
		$result = $db -> loadResult();
		
		// Return the Hello
		return $result;
	}

}
