<?php
	class publicite
	{
		private $id;
		private $desc;
		private $image;

		public function get_id()
		{
			return $this->id;
		}

		public function set_id($id)
		{
			$this->id = $id;
		}

		public function get_desc()
		{
			return $this->desc;
		}

		public function set_desc($d)
		{
			$this->desc = $d;
		}
		
		
		public function get_image()
		{
			return $this->image;
		}

		public function set_image($image)
		{
			$this->image = $image;
		}

	}