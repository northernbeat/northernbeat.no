<?php

namespace NorthernBeat\Plugin;

class FormBuilder
{

    // Advanced fields
    private $advanced = array(
        "tab"          => array("class"    => "FormFieldTab"),
        "post"         => array("class"    => "FormFieldPost"),
        "content"      => array("class"    => "FormFieldComplexContent",
                                "label"    => "Innhold"),
        "customer"     => array("class"    => "FormFieldPost",
                                "key"      => "customer",
                                "label"    => "Kunde",
                                "postType" => array("customer"),
                                "multiple" => false),
        "customers"    => array("class"    => "FormFieldPost",
                                "key"      => "customers",
                                "label"    => "Kunde",
                                "postType" => array("customer"),
                                "multiple" => true),
        "message"      => array("class"    => "FormFieldMessage",
                                "key"      => "message",
                                "label"    => ""),
        "employees"    => array("class"    => "FormFieldPost",
                                "key"      => "employees",
                                "label"    => "Ansatte",
                                "postType" => array("employee"),
                                "multiple" => true),
        "quote"         => array("class"    => "FormFieldPost",
                                 "key"      => "quote",
                                 "label"    => "Sitat",
                                 "postType" => array("quote"),
                                 "multiple" => false),
        "quotetarget"   => array("class"   => "FormFieldRadio",
                                 "key"     => "quotetarget",
                                 "label"   => "Hvem handler sitatet om?",
                                 "choices" => ["nbeat"    => "Northern Beat",
                                               "customer" => "Kunden eller løsningen"]),
        "photowidth"    => array("class"   => "FormFieldRadio",
                                 "key"     => "photowidth",
                                 "label"   => "Hvor bredt skal bildet være?",
                                 "instructions" => "Hvis du har valgt to bilder over, vil de hver fylle halvparten av bredden du velger her",
                                 "choices" => ["full" => "Full skjermbredde",
                                               "grid" => "Full grid (ca. 1200px)",
                                               "text" => "Følg teksten (10/12 av grid)"]),
        "numcolumns" => array("class"   => "FormFieldSelect",
                              "key"     => "numcolumns",
                              "label"   => "Antall kolonner",
                              "choices" => ["1" => "En",
                                            "2" => "To",
                                            "3" => "Tre"],
                              "defaultValue" => 1),
        "one-or-two-photos" => array("class"    => "FormFieldGallery",
                                     "key"      => "photos",
                                     "label"    => "Velg bilder",
                                     "min"      => 1,
                                     "max"      => 2),
        "metrics"           => array("class"    => "FormFieldRepeater",
                                     "key"      => "metrics",
                                     "label"    => "Nøkkeltall",
                                     "min"      => 1,
                                     "max"      => 6,
                                     "fields"   => ["name", "sign", "value"]),
        "answers"           => array("class"    => "FormFieldRepeater",
                                     "key"      => "answers",
                                     "label"    => "Svaralternativer",
                                     "layout"   => "row",
                                     "min"      => 2,
                                     "max"      => 5,
                                     "fields"   => ["answer", "correct"]),
        "sign"              => array("class"   => "FormFieldSelect",
                                     "key"     => "sign",
                                     "label"   => "Fortegn",
                                     "choices" => ["plus"  => "+",
                                                   "minus" => "-"]),
        "correct"           => array("class"   => "FormFieldBoolean",
                                     "key"     => "correct",
                                     "label"   => "Rett svar?",
                                     "defaultValue" => false),
    );
    
    // Simple fields
    private $simple = array(
        
        // Personal-ish about/contact information
        "name"      => array("label"   => "Navn",
                             "type"    => "text"),
        "firstname" => array("label"   => "Fornavn",
                             "type"    => "text"),
        "lastname"  => array("label"   => "Etternavn",
                             "type"    => "text"),
        "email"     => array("label"   => "Epost",
                             "type"    => "text",
                             "append"  => "@northernbeat.no"),
        "phone"     => array("label"   => "Telefon",
                             "type"    => "text",
                             "prepend" => "+47"),
        "title"     => array("label"   => "Tittel/rolle",
                             "type"    => "text"),

        // Social media
        "facebook"  => array("label"   => "Facebook",
                             "type"    => "text",
                             "prepend" => "https://facebook.com/"),
        "instagram" => array("label"   => "Instagram",
                             "type"    => "text",
                             "prepend" => "https://instagram.com/"),
        "twitter"   => array("label"   => "Twitter",
                             "type"    => "text",
                             "prepend" => "https://twitter.com/"),
        "snapchat"  => array("label"   => "Snapchat",
                             "type"    => "text"),
        "webpage"   => array("label"   => "Webside",
                             "type"    => "url"),
        "webpagetitle" => array("label"   => "Tittel på webside",
                             "type"    => "text"),

        // Images
        "coverimage" => array("label" => "Coverimage",
                              "type"  => "image"),
        "photo"      => array("label" => "Bilde",
                              "type"  => "image"),
        "logo"       => array("label" => "Logo",
                              "type"  => "image"),
        "icon"       => array("label" => "Ikon",
                              "type"  => "image"),

        // Text fields
        "heading"     => array("label" => "Overskrift",
                               "type"  => "text"),
        "description" => array("label" => "Beskrivelse",
                               "type"  => "textarea"),
        "plaintext"   => array("label" => "Tekst",
                               "type"  => "textarea"),
        "richtext"    => array("label" => "Tekst",
                               "type"  => "wysiwyg"),
        "ingress"     => array("label" => "Ingress",
                               "type"  => "textarea",
                               "rows"  =>  4),
        "caption"     => array("label" => "Bildetekst",
                               "type"  => "textarea",
                               "rows"  => 2),

        // Quiz
        "question"    => array("label" => "Spørsmål",
                               "type"  => "textarea",
                               "rows"  => 4),
        "answer"      => array("label" => "Svar",
                               "type"  => "textarea",
                               "rows"  => 2),


        // Special stuff
        "value"       => array("label"   => "Verdi",
                               "type"    => "text"),
        "posttype"    => array("label"   => "Posttype",
                               "type"    => "select",
                               "choices" => ["employee" => "Ansatte",
                                             "case"     => "Case",
                                             "service"  => "Tjenester",
                                             "quote"    => "Sitat"]),
        "numitems"    => array("label"   => "Antall",
                               "type"    => "select",
                               "choices" => ["all" => "Alle",
                                             "1"   => "1",
                                             "2"   => "2",
                                             "3"   => "3",
                                             "4"   => "4",
                                             "5"   => "5",
                                             "6"   => "6",
                                             "7"   => "7",
                                             "8"   => "8",
                                             "9"   => "9",
                                             "10"  => "10"]),
        "orderby"     => array("label"   => "Sorter etter",
                               "type"    => "select",
                               "choices" => ["date" => "Dato",
                                             "name" => "Navn",
                                             "rand" => "Tilfeldig"]),
        "order"       => array("label"   => "Rekkefølge",
                               "type"    => "select",
                               "choices" => ["asc"  => "Stigende",
                                             "desc" => "Synkende"]),
        "numperrow"   => array("label"   => "Antall per linje",
                               "type"    => "select",
                               "choices" => ["1" => "1",
                                             "2" => "2",
                                             "3" => "3"]),
        "gridwidth"   => array("label"   => "Innholdsbredde",
                               "type"    => "select",
                               "choices" => ["full" => "Full skjermbredde",
                                             "grid" => "Grid (12/12)",
                                             "text" => "Tekstbredde (10/12)"]),
        // Agenda fields
        "agendaheading" => array("label" => "Overskrift",
                                 "type"  => "text"),
        "agendatext"    => array("label" => "Beskrivelse",
                                 "type"  => "textarea"),
        "timefrom"      => array("label" => "Fra kl.",
                                 "type"  => "text"),
        "timeto"        => array("label" => "Til kl.",
                                 "type"  => "text"),
        "agendaitem"    => array("label"    => "Hendelse",
                                 "key"      => "agendaitem",
                                 "type"     => "repeater",
                                 "layout"   => "row",
                                 "fields"   => ["timefrom", "timeto", "agendaheading", "agendatext"]),
    );

    // Layouts
    private $layouts = array(
        // Quote
        "quote" => array("label" => "Sitat",
                         "fields" => array("quote", "quotetarget")),
        "text"  => array("label" => "Tekst",
                         "fields" => array("heading", "richtext", "numcolumns")),
        "photo" => array("label" => "Bilde",
                         "fields" => array("one-or-two-photos", "photowidth", "caption")),
        "contact" => array("label" => "Kontaktpersoner",
                           "fields" => array("heading", ["key" => "contactheading"],
                                             "ingress", ["key" => "contactingress"],
                                             "employees")),
        "metrics" => array("label" => "Nøkkeltall",
                           "fields" => array("heading", ["key" => "mheading"],
                                             "plaintext", ["key" => "mtext"],
                                             "metrics")),
        "question" => array("label" => "Spørsmål",
                            "fields" => array("question", "answers")),
        "listview" => array("label" => "Listevisning",
                            "fields" => array("posttype", "numitems", "orderby", "order",
                                              "numperrow", "gridwidth")),
    );

    // Field sets
    private $fieldsets = array(
        "set::color" => array(
            array("class"   => "FormFieldMessage",
                  "key"     => "colorscheme-message",
                  "label"   => "",
                  "message" => "Fargekombinasjonen du velger her brukes til overlay i oversikten over case, samt på enkelte overskrifter og detaljer inne på sidevisningen for et enkelt case."
            ),
            array("class"   => "FormFieldRadio",
                  "key"     => "colorscheme-radio",
                  "label"   => "Temafarge",
                  // "description" => "
                  "choices" => ["predefined" => "Predefinerte farger",
                                "self"       => "Velg selv"]
            ),
            array("class"   => "FormFieldSelect",
                  "key"     => "colorscheme-pre",
                  "label"   => "Velg fargekombinasjon",
                  "conditionalLogic" => [[["field" => "case-colorscheme-radio", "operator" => "==", "value" => "predefined"]]],
                  "choices" => [
                                "blue"        => "Blå",
                                "green"       => "Grønn",
                                "gray"        => "Grå",
                                "gray-dark"   => "Grå, mørk",
                                "gray-darker" => "Grå, mørkere",
                                "purple"      => "Lilla",
                                "orange"      => "Oransje",
                  ],
            ),
            array("class"   => "FormFieldColorpicker",
                  "key"     => "colorpicker-bg",
                  "label"   => "Bakgrunnsfarge",
                  "conditionalLogic" => [[["field" => "case-colorscheme-radio", "operator" => "==", "value" => "self"]]],
            ),
            array("class"   => "FormFieldColorpicker",
                  "key"     => "colorpicker-fg",
                  "label"   => "Tekst",
                  "conditionalLogic" => [[["field" => "case-colorscheme-radio", "operator" => "==", "value" => "self"]]],
            ),
            array("class"   => "FormFieldBoolean",
                  "key"     => "color-tint",
                  "label"   => "Gjennomsiktig bakgrunnsfarge?"
            ),
        ),
        // "set::contact" => array(
        //     "heading", ["key" => "contactheading"], "ingress", ["key" => "contactingress"], "employees"
        // ),
    );



    public function __construct($input, $id)
    {
        $this->orig     = $input;
        $this->postType = $id;
        $this->prefix   = $id . "-";
    }



    public function parse()
    {
        $gIndex = 0;
        
        if (!is_array($this->orig) || sizeof($this->orig) < 1) {
            error_log("Form builder input is not valid");
        }

        foreach ($this->orig as $group) {
            ++$gIndex;
            $groupData = $this->parseGroup($group);
            $groupData["menu_order"] = $gIndex;
            // $this->log($groupData);
            acf_add_local_field_group($groupData);
        }
    }


    
    private function parseGroup(array $g)
    {
        $key       = $g[0];
        $label     = $g[1];
        $fields    = $g[2];
        $groupOpts = array();

        if (isset($g[3]) && is_array($g[3])) {
            $groupOpts = $g[3];
        }

        $group = new \NorthernBeat\Plugin\FormGroup($key, $label, $this->postType, $this->prefix, $groupOpts);
        $list = $this->parseFields($fields, $group->getKey());
        $group->setFields($list);
        
        return $group->get();
    }



    private function parseFields($fields, $prefix)
    {
        $ret    = array();
        $prefix = $prefix . "-";

        for ($i = 0; $i < count($fields); ++$i) {
            $name = $fields[$i];
            $opts  = array();
            $next  = $i + 1;
            $field = null;
            
            if (is_array($name) && !isset($name["class"])) {
                continue;
            }

            if (is_string($name)) {
                if (isset($fields[$next]) && is_array($fields[$next])) {
                    $opts = $fields[$next];
                }
                
                if (isset($opts["key"])) {
                    $opts["key"] = $this->prefix . $opts["key"];
                } else {
                    $opts["key"] = $this->prefix . $name;
                }

                // If field set
                if ("set::" == substr($name, 0, 5) && isset($this->fieldsets[$name])) {
                    $set    = $this->fieldsets[$name];
                    $parsed = $this->parseFields($set, $prefix);

                    foreach ($parsed as $p) {
                        $ret[] = $p;
                    }
                    
                    continue;
                }

                // If target is one of the predefined classes, ie. tab
                else if (isset($this->advanced[$name])) {
                    $class = "\\NorthernBeat\\Plugin\\" . $this->advanced[$name]["class"];
                    $opts  = array_merge($this->advanced[$name], $opts);
                    $field = new $class($opts, $this);

                    if (isset($this->advanced[$name]["fields"])) {
                        $sub = $this->parseFields($this->advanced[$name]["fields"], $prefix);
                        $field->setFields($sub);
                    }
                    
                // If target is a predefined simple field, ie. firstname
                } elseif (isset($this->simple[$name])) {
                    $type  = $this->simple[$name]["type"];
                    $class = "\\NorthernBeat\\Plugin\\FormField" . ucfirst($type);
                    $opts = array_merge($this->simple[$name], $opts);
                    $opts["name"] = $opts["key"];
                    $field = new $class($opts, $this);
                } else {
                    die(sprintf("Invalid custom post field configuration. " .
                                "Post type: %s, Group: %s, Field: %s",
                                $this->postType, $prefix, $name));
                }
            } elseif (is_array($name)) {
                $name["key"] = $this->prefix . $name["key"];
                $class = "\\NorthernBeat\\Plugin\\" . $name["class"];
                unset($name["class"]);

                $field = new $class($name, $this);
            }

            $ret[] = $field->get();
        }

        return $ret;
    }

    

    public function getLayout($l, $parentKey)
    {
        if (!isset($this->layouts[$l])) {
            die("Invalid layout '$l'");
        }

        $opts = $this->layouts[$l];
        $opts["key"] = $parentKey . "-" . $l;
        
        $fields = $opts["fields"];
        unset($opts["fields"]);
        $layout = new \NorthernBeat\Plugin\FormLayout($opts);
        $list = $this->parseFields($fields, $opts["key"]);
        $layout->setFields($list);

        return $layout->get();
    }



    private function log($in)
    {
        $file = "/tmp/wp-debug.log";
        $fh = fopen($file, "a");

        fwrite($fh, "\n\n\n" . str_repeat("*", 60) . "\n");
        fwrite($fh, print_r($in, true));
        fwrite($fh, "\n\n\n" . str_repeat("*", 60) . "\n");
        fclose($fh);
    }

}
