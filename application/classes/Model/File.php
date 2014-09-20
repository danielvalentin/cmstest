<?php defined('SYSPATH') or die('No direct script access.');

class Model_File extends ORM {
	
	public $path = 'files/';
	protected $parent_key = 'file_id';
	protected $image = false;
	protected $allowed_exts = array(
		'jpg',
		'jpeg',
		'gif',
		'png',
		'pdf',
		'doc',
		'docx',
		'xls',
		'xlsx',
		'odt',
		'ods',
		'txt',
		'rtf'
	);
	protected $allowed_mimes = array(
		'image/jpeg',
		'image/gif',
		'image/png',
		'image/bmp',
		'application/pdf',
		'application/msword',//.doc
		'application/vnd.openxmlformats-officedocument.wordprocessingml.document',//.docx
		'application/vnd.ms-excel',//.xls
		'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',//.xlsx
		'application/vnd.oasis.opendocument.text',//.odt
		'application/vnd.oasis.opendocument.spreadsheet',//ods
		'text/plain',
		'text/rtf'
	);
	//protected $maxsize = 2000000; // 2 mb
	protected $maxsize = false;
	protected $require_login = false;
	protected $limit = 2; // Limit the number of files that can be uploaded
	
	protected $minisize = 32;
	protected $thumbsize = 145;
	
	protected $_has_many = array(
		'versions' => array('model'=>'File_Version'),
		'tags' => array('through' => 'files_tags')
	);
	
	protected $_sorting = array(
		'id' => 'ASC'
	);
	
	public function path()
	{
		return URL::site($this->path.$this->filename(), true);
	}
	
	public function filename()
	{
		$fileparts = explode('/', $this->filename);
		return end($fileparts);
	}
	
	public function size()
	{
		try
		{
			$file = filesize($this->path.$this->filename());
			return files::format_bytes($file);
		}
		catch(exception $e)
		{
			return '';
		}
	}
	
	public function is_image()
	{
		$imgtypes = array(
			'image/jpeg',
			'image/gif',
			'image/png',
			'image/bmp'
		);
		return in_array($this->type, $imgtypes);
	}
	
	public function get_icon($size = 145)
	{
		switch($this->ext)
		{
			case 'txt':
				$icon = 'txt.png';
				break;
			case 'zip':
			case 'tar.gz':
			case 'tar.gz2':
			case 'rar':
			case '7z':
				$icon = 'zip.png';
				break;
			case 'rtf':
				$icon = 'rtf.png';
				break;
			case 'pdf':
				$icon = 'pdf.png';
				break;
			case 'doc':
			case 'docx':
			case 'odt':
				$icon = 'doc.png';
				break;
			case 'xls':
			case 'xlsx':
			case 'ods':
				$icon = 'xls.png';
				break;
			case 'xml':
				$icon = 'xml.png';
				break;
			case 'js':
			case 'css':
			case 'php':
				$icon = 'js.png';
				break;
			case 'ogg':
			case 'flv':
			case 'f4v':
			case 'wmv':
				$icon = 'mp4.png';
				break;
			case 'mp3':
			case 'wav':
				$icon = 'mp3.png';
				break;
			default:
				$icon = '_blank.png';
				break;
		}
		return cms::url('media/img/file-icons/'.$size.'px/' . $icon);
	}
	
	public function info()
	{
		$filetags = array();
		$tags = $this->tags->find_all();
		if((bool)$tags->count())
		{
			foreach($tags as $tag)
			{
				$filetags[] = $tag->info();
			}
		}
		$versions = $this->versions->find_all();
		$versionsarr = array();
		if((bool)$versions->count())
		{
			foreach($versions as $version)
			{
				$versionsarr[] = $version->info();
			}
		}
		return array(
			'id' => $this->id,
			'filesize' => $this->size(),
			'filetype' => $this->type,
			'filedate' => date::dkdate('d. M, Y', $this->created),
			'filename' => $this->filename(),
			'alt' => $this->alt,
			'width' => $this->width,
			'height' => $this->height,
			'description' => $this->description,
			'thumbnails' => array(
				'mini' => $this->get_mini(),
				'medium' => $this->get_medium(),
				'thumbnail' => $this->get_thumbnail()
			),
			'image' => $this->is_image(),
			'versions' => $versionsarr,
			'path' => $this->path(),
			'title' => $this->title,
			'tags' => $filetags
		);
	}
	
	public function get_thumbnail()
	{
		if($this->is_image())
		{
			$thumb = $this->versions
				->where('title','=', 'thumbnail')
				->find();
			if(!$thumb->loaded())
			{
				$thumbimg = img::show($this->path.$this->filename, $this->thumbsize, $this->thumbsize);
				$thumb->file_id = $this->id;
				$thumb->title = 'thumbnail';
				$thumb->filename = $this->path_to_filename($thumbimg->file);
				$thumb->width = $thumbimg->width;
				$thumb->height = $thumbimg->height;
				$thumb->time = time();
				$thumb->save();
			}
			return URL::site($this->path.$thumb->filename);
		}
		return $this->get_icon($this->thumbsize);
	}
	
	public function get_medium()
	{
		if($this->is_image())
		{
			$thumb = $this->versions
				->where('title','=', 'medium')
				->find();
			if(!$thumb->loaded())
			{
				$thumbimg = img::exact($this->path.$this->filename, $this->thumbsize, $this->thumbsize);
				$thumb->file_id = $this->id;
				$thumb->title = 'medium';
				$thumb->filename = $this->path_to_filename($thumbimg->file);
				$thumb->width = $this->thumbsize;
				$thumb->height = $this->thumbsize;
				$thumb->time = time();
				$thumb->save();
			}
			return URL::site($this->path.$thumb->filename);
		}
		return $this->get_icon($this->thumbsize);
	}
	
	public function get_mini()
	{
		if($this->is_image())
		{
			$thumb = $this->versions
				->where('title','=', 'mini')
				->find();
			if(!$thumb->loaded())
			{
				$thumbimg = img::exact($this->path.$this->filename, $this->minisize, $this->minisize);
				$thumb->file_id = $this->id;
				$thumb->title = 'mini';
				$thumb->filename = $this->path_to_filename($thumbimg->file);
				$thumb->width = $this->minisize;
				$thumb->height = $this->minisize;
				$thumb->time = time();
				$thumb->save();
			}
			return URL::site($this->path.$thumb->filename);
		}
		return $this->get_icon($this->minisize);
	}
	
	public function get_thumb_markup($width = NULL, $height = NULL, $master = NULL)
	{
		if($this->is_image())
		{
			return '<a rel="gallery" href="'.$this->show().'" class="fancybox"><img src="'.$this->show($width, $height, $master).'" alt="'.$this->alt.'" /></a>';
		}
		return '<img src="'.$this->get_icon().'" alt="'.$this->filename.'" />';
	}
	
	public function _get_thumb($width = 145, $height = 145, $master = NULL)
	{
		if($this->is_image())
		{
			$size = $this->versions
				->where('width', '=', $width)
				->where('height', '=', $height)
				->find();
			if(!$size->loaded())
			{
				$img = img::factory($this->path.$this->filename);
				//$img = img::show($this->path.$this->filename, $width, $height, $master);
				//$img->resize(NULL, $height, Image::HEIGHT);
				$img->crop($width, $height);
				$size->file_id = $this->id;
				$size->filename = $this->path_to_filename($img->file);
				$size->width = $width;
				$size->height = $height;
				$size->time = time();
				$size->save();
			}
			return URL::site($this->path.$size->filename());
		}
		return $this->get_icon();
	}
	
	public function exact($width, $height)
	{
		if(!$this->is_image())
		{
			return $this->path.$this->filename();
		}
		$size = $this->versions
			->where('width','=',$width)
			->where('height', '=', $height)
			->find();
		if(!$size->loaded())
		{
			$img = img::exact($this->path.$this->filename, $width, $height);
			
			$size->file_id = $this->id;
			$size->filename = $this->path_to_filename($img->file);
			$size->width = $width;
			$size->height = $height;
			$size->time = time();
			$size->save();
		}
		return $this->path.$size->filename();
	}
	
	public function show($width = NULL, $height = NULL, $master = NULL)
	{
		if(!$this->is_image())
		{
			return $this->path.$this->filename();
		}
		if($width || $height)
		{
			$size = $this->versions;
			if($width)
			{
				$size = $size->where('width', '=', $width);
			}
			if($height)
			{
				$size = $size->where('height', '=', $height);
			}
			$size = $size->find();
			if(!$size->loaded())
			{
				$img = img::show($this->path.$this->filename, $width, $height, $master);
				
				$size->file_id = $this->id;
				$size->filename = $this->path_to_filename($img->file);
				$size->width = $img->width;
				$size->height = $img->height;
				$size->time = time();
				$size->save();
			}
			return $this->path.$size->filename();
		}
		else
		{
			return $this->path . $this->filename();
		}
	}
	
	private function path_to_filename($path)
	{
		$fileparts = explode('/', $path);
		return end($fileparts);
	}
	
	public function _show($width = false, $height = false, $crop = false, $protocol = null)
	{
		if(!$this->is_image())
		{
			return $this->filename();
		}
		if($width || $height)
		{
			$size = $this->versions;
			if($width)
			{
				$size = $size->where('width', '=', $width);
			}
			if($height)
			{
				$size = $size->where('height', '=', $height);
			}
			$size = $size->find();
			if(!$size->loaded())
			{
				$path = img::get($this->path(), $width, $height, $crop, $this->path);
				$pathparts = explode('/', $path);
				$filename = $pathparts[count($pathparts)-1];
				$parentkeyname = $size->parent_key;
				$size->$parentkeyname = $this->id;
				$size->filename = $filename;
				$size->width = $width;
				$size->height = $height;
				$size->time = time();
				$size->save();
			}
			return URL::site($this->path.$size->filename,$protocol);
		}
		else
		{
			return URL::site($this->path . $this->filename(),$protocol);
		}
	}
	
	public function delete_versions()
	{
		if((bool)$this->versions->count_all()) foreach($this->versions->find_all() as $version)
		{
			$version->delete();
		}
	}
	
	public function delete()
	{
		$this->delete_versions();
		try
		{
			unlink($this->path.$this->filename);
			if((bool)$this->tags->count_all())
			{
				foreach($this->tags->find_all() as $tag)
				{
					$this->remove('tags',$tag);
				}
			}
		}
		catch(exception $e)
		{
			// Probably been removed by the user causing the exception? In any case, we don't want to die.
		}
		return parent::delete();
	}
	
	public function upload($file, $limits = array())
	{
		if($this->require_login)
		{
			// Forcing a user exception
			$this->user_id = user::get()->id;
		}
		
		$parts = explode('.',$file['name'][0]);
		$orgfilename = $file['name'][0];
		$size = $file['size'][0];
		$this->ext = strtolower(end($parts));
		/*
		if($this->allowed_exts != false && !in_array($this->ext, $this->allowed_exts))
		{
			// Illegal file extention
			throw new Exception_File(__('The file: ":filename" is an illegal filetype. Allowed types are: :allowedtypes', array(
				':filename' => $orgfilename,
				':allowedtypes' => implode(', ',$this->allowed_exts)
			)));
		}
		*/
		if($this->maxsize != false && (!$size || $size == 0 || $size > $this->maxsize))
		{
			// Too big
			throw new Exception_File(__('The file: ":filename" is too large! Max size is: :maxsize',array(
				':filename' => $orgfilename,
				':maxsize' => files::format_bytes($this->maxsize)
			)));
		}
		if($this->require_login && !user::logged())
		{
			// We only accept files from logged in users
			throw new Exception_User(__('You must be logged in to upload files. Please log in and try again'));
		}
		$this->filename = files::randomname().'.'.$this->ext;
		$i = 2;
		while(file_exists($this->path.$this->filename))
		{
			$this->filename = files::randomname().'.'.$this->ext;
		}
		
		try
		{
			move_uploaded_file($file['tmp_name'][0], $this->path. $this->filename); // Should probably throw an exception if it fails
			
			$finfo = new finfo(FILEINFO_MIME);
			$type = $finfo->file($this->path . $this->filename);
			$mime = substr($type, 0, strpos($type, ';'));
			
			/*
			if($this->allowed_mimes != false && !in_array($mime, $this->allowed_mimes))
			{
				// Illegal file mime
				throw new Exception_File(__('The file: ":filename" is an illegal filetype. Allowed types are: :allowedtypes', array(
					':filename' => $orgfilename,
					':allowedtypes' => implode(', ',$this->allowed_exts)
				)));
			}
			*/
			
			$this->type = $mime;
			$this->created = time();
			$titleparts = explode('.', $orgfilename);
			$nameparts = array_slice($titleparts, 0, count($titleparts)-1);
			$this->title = implode('.', $nameparts);
			
			if($this->is_image())
			{
				$size = getimagesize($this->path.$this->filename);
				$this->width = arr::get($size, 0);
				$this->height = arr::get($size, 1);
			}
			
			$this->save();
			
			// Creating thumbnails
			$this->make_thumbnails();
			
			//Tags
			$exttag = ORM::factory('Tag')->where('tag','=', $this->ext)->find();
			if(!$exttag->loaded())
			{
				$exttag->tag = $this->ext;
				$exttag->slug = site::slugify($this->ext);
				$exttag->save();
			}
			$this->add('tags', $exttag);
			
			return $this;
		}
		catch(exception $e)
		{
			// File move failed. Maybe log the error?
			if(file_exists($this->path.$this->filename))
			{
				unlink($this->path.$this->filename);
			}
			throw $e;
		}
	}
	
	private function make_thumbnails()
	{
		if($this->is_image())
		{
			// Only resize images that are larger than the thumb dimentions on either side
			if($this->width < $this->minisize || $this->height < $this->minisize)
			{
				if($this->width > $this->height)
				{
					$minisize = $this->width;
				}
				elseif($this->width < $this->height)
				{
					$minisize = $this->height;
				}
				else
				{
					$minisize = $this->width;
				}
			}
			else
			{
				$minisize = $this->minisize;
			}
			if($this->width < $this->thumbsize || $this->height < $this->thumbsize)
			{
				if($this->width > $this->height)
				{
					$thumbsize = $this->width;
				}
				elseif($this->width < $this->height)
				{
					$thumbsize = $this->height;
				}
				else
				{
					$thumbsize = $this->width;
				}
			}
			else
			{
				$thumbsize = $this->thumbsize;
			}
			
			$miniimg = img::exact($this->path.$this->filename, $minisize, $minisize);
			$minisizefile = ORM::factory('File_Version');
			$minisizefile->file_id = $this->id;
			$minisizefile->title = 'mini';
			$minisizefile->filename = $this->path_to_filename($miniimg->file);
			$minisizefile->width = $minisize;
			$minisizefile->height = $minisize;
			$minisizefile->time = time();
			$minisizefile->save();
			
			$mediumimg = img::exact($this->path.$this->filename, $thumbsize, $thumbsize);
			$mediumsize = ORM::factory('File_Version');
			$mediumsize->file_id = $this->id;
			$mediumsize->title = 'medium';
			$mediumsize->filename = $this->path_to_filename($mediumimg->file);
			$mediumsize->width = $thumbsize;
			$mediumsize->height = $thumbsize;
			$mediumsize->time = time();
			$mediumsize->save();
			
			$thumbimg = img::show($this->path.$this->filename, $thumbsize, $thumbsize);
			$thumbsizefile = ORM::factory('File_Version');
			$thumbsizefile->file_id = $this->id;
			$thumbsizefile->title = 'thumbnail';
			$thumbsizefile->filename = $this->path_to_filename($thumbimg->file);
			$thumbsizefile->width = $thumbimg->width;
			$thumbsizefile->height = $thumbimg->height;
			$thumbsizefile->time = time();
			$thumbsizefile->save();
		}
	}
	
}

