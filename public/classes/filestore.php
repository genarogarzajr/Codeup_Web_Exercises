<?php

class Filestore {

    public $filename = '';

    function __construct($filename = '') 
    {
        $this->filename = $filename;
    }

    /**
     * Returns array of lines in $this->filename
     */
    function read_lines()
    {
        $list_array = [];
        if (is_readable($this->x_filename) && filesize($this->x_filename) > 0) 
        {
            $handle = fopen($this->x_filename, "r");
            $contents = (fread($handle, filesize($this->x_filename)));
            $contents = trim($contents);
            fclose($handle);
            return $contents;
        }
        $contents = implode("", $list_array);
        return $contents;   
    }

    /**
     * Writes each element in $array to a new line in $this->filename
     */
    function write_lines($array)
    {
        $handle = fopen($this->filename, "w");
        fwrite($handle, $contents);
        fclose($handle);
    }

    /**
     * Reads contents of csv $this->filename, returns an array
     */
    function read_csv()
    {
        // Code to read file $this->filename
        $addresses = [];
        // read each line of CSV and add rows to addresses array
        // todo
        $handle = fopen($this->filename, "r");
        while (!feof($handle)) {
            $row = fgetcsv($handle);
            if (is_array($row)) {
                $addresses[] = $row; // array_push($addresses, $row);
            }
        }
        fclose($handle);
        return $addresses;
    }

    /**
     * Writes contents of $array to csv $this->filename
     */
    function write_csv($array)
    {
        // Code to write $addresses_array to file $this->filename
        if (is_writable($this->filename)) {
            $handle = fopen($this->filename, "w");
            foreach ($addresses as $entries) {
                fputcsv($handle, $entries);
            }
            fclose($handle);
        }
    }

}