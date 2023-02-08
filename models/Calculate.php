<?php
class Calculate
{
    public const BIG_BOX = 12;
    public const MIDDLE_BOX = 6;
    public const MIN_BOX = 3;
    public const ALL_BOXES = [
        self::BIG_BOX,
        self::MIDDLE_BOX,
        self::MIN_BOX
    ];

    public function __construct(private int $count) { }

    public function calculate(): array
    {
        $boxes = [];
        foreach (self::ALL_BOXES as $box) {
            if ($box > $this->count) {
                $boxes[] = $this->checkEndBox();
                return $boxes;
            }
            while ($this->count >= $box) {
                $this->count -= $box;
                $boxes[] = $box;
            }
        }
        return $boxes;
    }

    private function checkEndBox()
    {
        foreach (array_reverse(self::ALL_BOXES) as $box) {
            if ($this->count > $box) {
                continue;
            }
            return $box;
        }
    }

     public static function transformToText(array $values): array
     {
         $boxes = [];
         foreach (self::ALL_BOXES as $box) {
             $boxes[] = ['box' => $box, 'count' => 0];
         }
         $items = array_column($boxes, 'box');
         foreach ($values as $box) {
             foreach ($items as $key => $boxItem) {
                 if ($boxItem === $box) {
                     $boxes[$key]['count']++;
                 }
             }
         }
         return $boxes;
     }
}
