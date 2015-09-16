<?php

namespace NorthernBeat\Plugin;

class FormFieldGallery extends \NorthernBeat\Plugin\FormField
{

    protected $defaultValue = "";
    protected $min = "";
    protected $max = "";
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
            "type" => "gallery",
			"min" => $this->min,
			"max" => $this->max,
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