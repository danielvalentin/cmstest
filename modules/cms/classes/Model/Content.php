<?php defined('SYSPATH') or die('No direct script access.');class Model_Content extends Model_Stuffwithslugs {		protected $_belongs_to = array(		'contenttype' => array(),		'contenttypetype' => array(),		'user' => array(),		'splittestparent' => array('model' => 'content', 'foreign_key' => 'splittest')	);		protected $_has_many = array(		'blocks' => array(),		'categories' => array('through' => 'categories_content'),		'tags' => array('through' => 'contents_tags'),		'contenttypetypes' => array(),		'splittests' => array('model' => 'content', 'foreign_key' => 'splittest')	);		public function render_blocks()	{		$blocks = $this->blocks->find_all();		$html = '';		if((bool)$blocks->count())		{			foreach($blocks as $block)			{				switch($block->blocktype->type)				{					case 'richtext':					case 'plaintext':					case 'textfield':						$html .= $block;						break;					case 'gallery':						$files = json_decode($block->value);						$html .= '<div class="row">';						foreach($files->files as $file)						{							$html .= '<div class="col-xs-2 col-md-3">';							$description = $file->description;							$alt = $file->alt;							$file = ORM::factory('File', $file->id);							$path = $file->exact(270, 270);							$html .= '<div class="thumbnail">';							$html .= '<a href="'.$file->show().'" class="fancybox" rel="gallery">';							$html .= HTML::image($path, array(								'alt' => $alt							));							$html .= '</a>';							$html .= '<div class="caption">';							$html .= $description;							$html .= '</div>';							$html .= '</div>';							$html .= '</div>';						}						$html .= '</div>';						break;				}			}		}		return $html;	}		public function human_readable_created($segments = 2)	{		$when = Date::span($this->created);		$years = arr::get($when, 'years',0);		$months = arr::get($when, 'months',0);		$weeks = arr::get($when, 'weeks',0);		$days = arr::get($when, 'days',0);		$hours = arr::get($when, 'hours',0);		$minutes = arr::get($when, 'minutes',0);		$seconds = arr::get($when, 'seconds',0);		$str = array();		if($years > 0)		{			$str[] = $years.' '.($years==1?__('year'):__('years'));		}		if($months > 0)		{			$str[] = $months.' '.($months==1?__('month'):__('months'));		}		if($weeks > 0)		{			$str[] = $weeks.' '.($weeks==1?__('week'):__('weeks'));		}		if($days > 0)		{			$str[] = $days.' '.($days==1?__('day'):__('days'));		}		if($hours > 0)		{			$str[] = $hours.' '.($hours==1?__('hour'):__('hours'));		}		if($minutes > 0)		{			$str[] = $minutes.' '.($minutes==1?__('minute'):__('minutes'));		}		if($seconds > 0)		{			$str[] = $seconds.' '.($seconds==1?__('second'):__('secondss'));		}		$str = array_slice($str, 0, $segments);		return implode(', ',$str);	}		public function has_thumb()	{		return (bool)$this->image_id;	}		public function get_thumb($width = 250, $height = 150)	{		$file = ORM::factory('File', $this->image_id);		if($file->loaded())		{			return $file->exact($width, $height);		}		return false;	}		public function info()	{				// Thumbnail		$thumbnail = false;		if($this->contenttype->supports('thumbnail'))		{			if($this->image_id != 0)			{				$thumb = ORM::factory('File', $this->image_id);				if($thumb->loaded())				{					//$thumbnail['img'] = $thumb->show(150, null, Image::WIDTH);					//$thumbnail['id'] = $thumb->id;					$thumbnail = $thumb->info();				}			}		}				// Splittests		$tests = ORM::factory('Content')->where('splittest','=',$this->id)->find_all();		$testsarr = array();		if((bool)$tests->count())		{			foreach($tests as $test)			{				$testsarr[] = array(					'id' => $test->id,					'title' => $test->splittest_title,					'hits' => $test->hits,					'parent_hits' => $test->splittest_parent_hits,					'created' => $test->created				);			}		}				return array(			'id' => $this->id,			'title' => $this->title(),			'status' => $this->status,			'statustext' => $this->statustext(),			'thumbnail' => $thumbnail,			'contenttype' => $this->contenttype->info(),			'contenttypetype' => $this->contenttypetype->info(),			'splittests' => $testsarr		);	}		public function baseinfo()	{				// Thumbnail		$thumbnail = false;		if($this->contenttype->supports('thumbnail'))		{			if($this->image_id != 0)			{				$thumb = ORM::factory('File', $this->image_id);				if($thumb->loaded())				{					//$thumbnail['img'] = $thumb->show(150, null, Image::WIDTH);					//$thumbnail['id'] = $thumb->id;					$thumbnail = $thumb->info();				}			}		}				return array(			'id' => $this->id,			'title' => $this->title(),			'status' => $this->status,			'statustext' => $this->statustext(),			'thumbnail' => $thumbnail,			'contenttype' => $this->contenttype->baseinfo(),			'contenttypetype' => $this->contenttypetype->baseinfo()		);	}		public function statustext()	{		switch($this->status)		{			case 'draft':			default:				return __('Draft');				break;			case 'active':				return __('Published');				break;		}	}		public function has_children()	{		return (bool)$this->children()->count();	}		public function children()	{		return ORM::factory('Content')			->where('parent','=',$this->id)			->find_all();	}		public function tags()	{		$tags = array();		if($this->contenttype->supports('tags'))		{			$zetags = $this->tags->find_all();			if((bool)$zetags->count())			{				foreach($zetags as $tag)				{					$tags[] = array(						'id' => $tag->id,						'tag' => $tag->tag,						'slug' => $tag->slug					);				}			}		}		return $tags;	}		public function blocktypes()	{		$blocktypes = array();		$theblocks = ORM::factory('Blocktype')			->where('parent','=',0)			->where('contenttype_id','=',$this->contenttype_id)			->where('contenttypetype_id','=',$this->contenttypetype_id)			->find_all();		if((bool)$theblocks->count())		{			foreach($theblocks as $block)			{				$blocktypes[] = $block->info();			}		}		return $blocktypes;	}		public function blocks()	{		$blocks = array();		$zeblocks = $this->blocks			->where('parent','=','0')			->find_all();		if($zeblocks->count())		{			foreach($zeblocks as $block)			{				$blocks[] = $block->info();			}		}		return $blocks;	}		public function get_url()	{		return $this->slug;	}		public function url()	{		return URL::site($this->guid);	}		public function get_link()	{		return HTML::anchor($this->get_url, $this->title());	}		// Alias	public function get_block_by_type($key)	{		return $this->get_block_by_key($key);	}		/**	 * Loads a single block where key = $key. Meant for blocks where max = 1	 */	public function get_block_by_key($key)	{		$block = ORM::factory('Blocktype')			->where('contenttype_id','=',$this->contenttype_id)			->where('key','=',$key)			->find();		if($block->loaded())		{			$block = $this->blocks				->where('blocktype_id','=',$block->id)				->find();			if($block->loaded())			{				return $block;			}		}		return false;	}		// Alias	public function get_blocks_by_type($key)	{		return $this->get_blocks_by_key($key);	}		/**	 * Loads all blocks where key = $key.	 */	public function get_blocks_by_key($key)	{		$block = ORM::factory('Blocktype')			->where('contenttype_id','=',$this->contenttype_id)			->where('key','=',$key)			->find();		if((bool)$block->loaded())		{			$block = $this->blocks				->where('blocktype_id','=',$block->id)				->order_by('order','ASC')				->find_all();			if((bool)$block->count())			{				return $block;			}		}		return false;	}		// get single root block	public function get_block($key)	{		return $this->blocks->find();	}	// get root blocks	public function get_blocks()	{		return $this->blocks			->where('parent','=',0)			->find_all();	}		public function delete()	{		if((bool)$this->tags->count_all())		{			foreach($this->tags->find_all() as $tag)			{				$this->remove('tags', $tag);			}		}		if((bool)$this->blocks->count_all())		{			foreach($this->blocks->find_all() as $block)			{				$block->delete();			}		}		if((bool)$this->categories->count_all())		{			foreach($this->categories->find_all() as $category)			{				$this->remove('categories', $category);			}		}		$kids = ORM::factory('Content')			->where('parent','=',$this->id)			->find_all();		if((bool)$kids->count())		{			foreach($kids as $kid)			{				$kid->parent = 0;				$this->check_slug_and_guid();				$kid->save();			}		}		// Splittests		$tests = ORM::factory('Content')			->where('splittest','=',$this->id)			->find_all();		if((bool)$tests->count())		{			foreach($tests as $test)			{				$test->delete();			}		}		return parent::delete();	}		public function recreate_slug_and_guid($redirect = false)	{		$prevguid = $this->guid;		$newguid = $this->slug;		$beforeslug = '';		if($this->parent != 0)		{			$parent = ORM::factory('Content')				->where('id','=',$this->parent)				->find();			if($parent->loaded())			{				$beforeslug = $parent->guid.'/';				$newguid = $parent->guid.'/'.$this->slug;			}			else			{				// Parent isn't loaded for some reason. Remove parent id				$this->parent = 0;			}		}		else		{			if($this->contenttype->slug != '')			{				$newguid = $this->contenttype->slug.'/'.$this->slug;			}		}		$existing = ORM::factory('Content')			->where('guid','=',$newguid)			->where('id','!=',$this->id)			->where('splittest','=',0)			->find();		$i = 2;		$orgslug = $this->slug;		while($existing->loaded())		{			$this->slug = $this->slug.'-'.$i;			$newguid = $beforeslug.$this->slug;			$existing = ORM::factory('Content')				->where('guid','=',$newguid)				->where('id','!=',$this->id)				->find();			$i++;		}		$this->guid = $newguid;		if($redirect)		{			$redirect = ORM::factory('Redirect')				->where('from','=',$prevguid)				->where('to','=',$this->guid)				->find();			if(!$redirect->loaded())			{				$redirect->from = $prevguid;				$redirect->to = $this->guid;				$redirect->save();			}		}	}		public function copy($splittest = false)	{		$new = ORM::factory('Content');		$new->contenttype_id = $this->contenttype_id;		$new->contenttypetype_id = $this->contenttypetype_id;		$new->parent = $this->parent;		if(!$splittest)		{			$new->title = $this->title.' ('.__('Copy').')';		}		else		{			$new->title = $this->title;		}		$new->slug = site::slugify($new->title);		$new->guid = $new->slug;		$new->image_id = $this->image_id;		$new->pagetitle = $this->pagetitle;		$new->metadescription = $this->metadescription;		$new->metakeywords = $this->metakeywords;		$new->canonical = $this->canonical;		$new->status = 'draft';		$new->created = time();				$new->save();		$new->recreate_slug_and_guid();		$new->save();				$tags = $this->tags->find_all();		if((bool)$tags->count())		{			foreach($tags as $tag)			{				$new->add('tags', $tag);			}		}				$blocks = $this->blocks->find_all();		if((bool)$blocks->count())		{			foreach($blocks as $block)			{				$block->copy($new->id);			}		}				$categories = $this->categories->find_all();		if((bool)$categories->count())		{			foreach($categories as $cat)			{				$new->add('categories',$cat);			}		}		return $new;	}		public function check_slug_and_guid()	{		if(empty($this->slug))		{			if(empty($this->title))			{				$this->slug = $this->id;			}			else			{				$this->slug = $this->title;			}		}		elseif($this->changed('slug'))		{
			
		}		else		{
			return;
		}		$this->slug = site::slugify($this->slug);		$newguid = $this->slug;		$beforeslug = $this->contenttype->slug;		if($this->parent != 0)		{			$parent = ORM::factory('Content')				->where('id','=',$this->parent)				->find();			if($parent->loaded())			{				$beforeslug = $parent->guid.'/';				$newguid = $parent->guid.'/'.$this->slug;			}			else			{				// Parent isn't loaded for some reason. Remove parent id				$this->parent = 0;			}		}		else		{			if($this->contenttype->slug != '')			{				$newguid = $this->contenttype->slug.'/'.$this->slug;			}		}		$existing = ORM::factory('Content')			->where('guid','=',$newguid)			->where('id','!=',$this->id)			->find();		$i = 2;		$orgslug = $this->slug;		while($existing->loaded())		{			$this->slug = $this->slug.'-'.$i;			$newguid = $beforeslug.$this->slug;			$existing = ORM::factory('Content')				->where('guid','=',$newguid)				->where('id','!=',$this->id)				->find();			$i++;		}		$this->guid = $newguid;	}		public function save(Validation $validation = NULL)	{		$res = parent::save($validation);		return $res;	}	}