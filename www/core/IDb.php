<?php

/**
 * Interface for database connections
 */
interface IDb {

    /**
     * Execute a single SQL statement
     * @param string $sql SQL statement to execute
     * @return FALSE on failure. IDbResult object on successful execution of a sql query returning data, TRUE otherwise
     */
    public function query( $sql );

    /**
     * Get the last error message
     * @return string
     */
    public function getError();


    /**
     * Escape characters for safe use in a sql query
     * @param string $str String to escape
     * @return escaped string (safe for use in IDb::query())
     */
    public function escape( $str );

}

/**
 * Interface for result sets
 */
interface IDbResult {

    /**
     * Get the next result row
     * @return array Associative array mapping the columns onto their values, or NULL if no more rows are available
     */
    public function next();
}
