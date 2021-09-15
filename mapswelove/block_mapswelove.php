<?php
class block_mapswelove extends block_base {
    public function init() {
        $this->title = get_string('mapswelove', 'block_mapswelove');
    }
    // The PHP tag and the curly bracket for the class definition
    // will only be closed after there is another function added in the next section.
	public function get_content() {
		if ($this->content !== null) {
		  return $this->content;
		}
		// next 12 lines import maapswelove cnotent.
		$row = 1;
		$temptrb='';
		if (($handle = fopen("https://k12.maps.arcgis.com/sharing/rest/content/items/45f7b3b45a2048f6b6cd9d849342f97c/data", "r")) !== FALSE) {
  		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    		$num = count($data);
    		$row++;
    	for ($c=0; $c < $num; $c++) {
        	$temptrb = $data[$c] . "";
    		}
  		}
  		fclose($handle);
		}

		$this->content         =  new stdClass;
		if (! empty($this->config->text)) {
				$this->content->text = $this->config->text;
			} else {
				$this->content->text   = "" . $temptrb;
			}

		$this->content->footer = '';

		return $this->content;
	}
	public function specialization() {
		if (isset($this->config)) {
			if (empty($this->config->title)) {
				$this->title = get_string('defaulttitle', 'block_mapswelove');
			} else {
				$this->title = $this->config->title;
			}

			if (empty($this->config->text)) {
				$this->config->text = get_string('defaulttext', 'block_mapswelove');
			}
		}
	}

}