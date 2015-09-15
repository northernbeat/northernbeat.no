<?php

namespace NorthernBeat\Plugin;

class FormFieldImage extends \NorthernBeat\Plugin\FormField
{
    
    protected $returnFormat = "id";
    protected $previewSize = "thumbnail";
    protected $library = "all";
    protected $minWidth = "";
    protected $minHeight = "";
    protected $minSize = "";
    protected $maxWidth = "";
    protected $maxHeight = "";
    protected $maxSize = "";
    protected $mimeTypes = "";


    
    public function getOverrides()
    {
        return array (
            "type" => "image",
			"return_format" => $this->returnFormat,
			"preview_size" => $this->previewSize,
			"library" => $this->library,
			"min_width" => $this->minWidth,
			"min_height" => $this->minHeight,
			"min_size" => $this->minSize,
			"max_width" => $this->maxWidth,
			"max_height" => $this->maxHeight,
			"max_size" => $this->maxSize,
			"mime_types" => $this->mimeTypes,
        );
    }
}
