<?php
/*
|--------------------------------------------------------------------------
| Laravel 5 - URL Query String Helper
|--------------------------------------------------------------------------
|
| A helper function to take a URL string then quickly and easily add query
| string parameters to it, or change existing ones.
|
| url_queries(['order' => 'desc', 'page' => 2],
|             'https://app.dev/users/?sort=username&order=asc');
| // https://app.dev/users/?sort=username&order=desc&page=2
|
*/
    if (! function_exists('url_queries')) {
        /**
         * Modifies the query strings in a given (or the current) URL.
         * @param  array       $queries Indexed array of query parameters
         * @param  string|null $url     URL to use parse. If none is supplied, the current URL of the page load will be used
         * @return string               The updated query string
         */
        function url_queries(array $queries, string $url=null) {
            // If a URL isn't supplied, use the current one
            if (! $url) {
                $url = \Request::fullUrl();
            }
            // Split the URL down into an array with all the parts separated out
            $url_parsed = parse_url($url);
            // Turn the query string into an array
            $url_params = [];
            if (isset($url_parsed) && isset($url_parsed['query'])) {
                parse_str($url_parsed['query'], $url_params);
            }
            // Merge the existing URL's query parameters with our new ones
            $url_params = array_merge($url_params, $queries);
            // Build a new query string from our updated array
            $string_query = http_build_query($url_params);
            // Add the new query string back into our URL
            $url_parsed['query'] = $string_query;
            // Build the array back into a complete URL string
            $url = build_url($url_parsed);
            return $url;
        }
    }
    if (! function_exists('build_url')) {
        /**
         * Rebuilds the URL parameters into a string from the native parse_url() function.
         * @param  array  $parts The parts of a URL
         * @return string        The constructed URL
         */
        function build_url(array $parts) {
            return (isset($parts['scheme']) ? "{$parts['scheme']}:" : '') . 
                ((isset($parts['user']) || isset($parts['host'])) ? '//' : '') . 
                (isset($parts['user']) ? "{$parts['user']}" : '') . 
                (isset($parts['pass']) ? ":{$parts['pass']}" : '') . 
                (isset($parts['user']) ? '@' : '') . 
                (isset($parts['host']) ? "{$parts['host']}" : '') . 
                (isset($parts['port']) ? ":{$parts['port']}" : '') . 
                (isset($parts['path']) ? "{$parts['path']}" : '') . 
                (isset($parts['query']) ? "?{$parts['query']}" : '') . 
                (isset($parts['fragment']) ? "#{$parts['fragment']}" : '');
        }
    }

?>