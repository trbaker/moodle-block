<?php
class block_simplehtml extends block_base {
    public function init() {
        $this->title = get_string('simplehtml', 'block_simplehtml');
    }
    // The PHP tag and the curly bracket for the class definition
    // will only be closed after there is another function added in the next section.
	public function get_content() {
		if ($this->content !== null) {
		  return $this->content;
		}


		$this->content         =  new stdClass;
		if (! empty($this->config->text)) {
				$this->content->text = $this->config->text;
			} else {
				$this->content->text   = 'The content of our SimpleHTML block!';
			}

		$this->content->footer = '';

		return $this->content;
	}
	public function specialization() {
		if (isset($this->config)) {
			if (empty($this->config->title)) {
				$this->title = get_string('defaulttitle', 'block_simplehtml');
			} else {
				$this->title = $this->config->title;
			}

			if (empty($this->config->text)) {
				$this->config->text = get_string('defaulttext', 'block_simplehtml');
			}
		}
	}

}