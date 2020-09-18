<?php

namespace App;

class NewsItem
{
    public $id;
    public $title;
    public $description;
    public $details;
    public $image = null;
    private $errors = [];

    const ITEMS = [
        [
            "id" => 1,
            "title" => "Black & Grey Realism",
            "description" => "Black & grey realistic portret ",
            "image" => "https://www.inkedmag.com/.image/t_share/MTU5MDMzMDQwNTI3NzYzMjI0/yz-asencio.png",
            "details" => "Black & grey realistic portret of a woman with a jaguar's head. The jaguar is representative of power, ferocity, and valor."
        ],
        [
            "id" => 2,
            "title" => "Japanese",
            "description" => "Japanese full color",
            "image" => "https://i.pinimg.com/736x/47/95/b4/4795b4b42a197f555dae71605fdfa896.jpg",
            "details" => "Japanese full color tattoo of koi fish, they are a symbol of determination and a strong will to succeed."
        ],
        [
            "id" => 3,
            "title" => "Traditional",
            "description" => "Traditional colorful tattoo",
            "image" => "https://tattmag.com/wp-content/uploads/2020/06/American-Traditional-Panther-Tattoo-2.jpg",
            "details" => "Traditional colourful tattoo of a black jaguar with a rose. The jaguar is representative of power, ferocity, and valor and roses are most commonly associated with love and romance."
        ],

        [
        "id" => 4,
        "title" => "Geometrical",
        "description" => "(Minimalistic) Geometrical tattoo. ",
        "image" => "https://www.beautifulwiki.com/wp-content/uploads/2019/01/112-Breathtaking-Minimalist-Geometric-Tattoo-Designs_35.jpeg",
            "details" => "No color Minimalistic Geometrical tattoo. Geometry stands for balance, symmetry, stability, intelligence, mystery and much more."
    ],

        [
        "id" => 5,
        "title" => "New School",
        "description" => "Colourful New School",
        "image" => "https://www.inkedmag.com/.image/c_fit%2Ccs_srgb%2Cq_auto:good%2Cw_620/MTU5MjMyNTg3MTIwNzgwNTAy/screen-shot-2018-10-17-at-102427-am.png",
        "details" => "Very colorful New School tattoo of Rick (from Rick & Morty). Rick is a very popular cartoon character, he is known to be a brilliant scientist, but an aggressive alcoholic who makes mistimed jokes as well."
        ]
    ];

    /**
     * @return \string[][]
     */
    static public function all()
    {
        return self::ITEMS;
    }

    /**
     * @param int $id
     * @return string[]
     * @throws \Exception
     */
    static public function find(int $id)
    {
        $itemIndex = array_search($id, array_column(self::ITEMS, 'id'));

        if ($itemIndex === false) {
            throw new \Exception("ID does not exist in NewsItem");
        }

        return self::ITEMS[$itemIndex];
    }

    /**
     * @return bool
     */
    public function save()
    {
        if (empty($this->title)) {
            $this->errors['title'] = 'Titel moet ingevuld zijn';
        }
        if (empty($this->description)) {
            $this->errors['description'] = 'Beschrijving moet ingevuld zijn';
        }

        //True/false based on state of errors
        return empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}

