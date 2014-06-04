<?php


class AddressDataStore {

    public $filename = '';

    public function __construct($filename) 
    {
    	$this->filename = $filename;
    }

    public function readAddressBook()
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

    public function writeAddressBook($addresses) 
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