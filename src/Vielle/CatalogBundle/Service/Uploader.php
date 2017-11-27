<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 23/11/2017
	 * Time: 14:45
	 */
	
	namespace Vielle\CatalogBundle\Service;
	
	use Symfony\Component\HttpFoundation\File\UploadedFile;
	
	class Uploader
	{
		private $targetDir;
		
		public function __construct($targetDir)
		{
			$this->targetDir = $targetDir;
		}
		
		public function upload(UploadedFile $file)
		{
			$fileName = md5(uniqid()).'.'.$file->guessExtension();
			
			$file->move($this->getTargetDir(), $fileName);
			
			return $fileName;
		}
		
		public function getTargetDir()
		{
			return $this->targetDir;
		}
	}
