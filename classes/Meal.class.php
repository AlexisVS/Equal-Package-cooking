<?php


namespace cooking;

use equal\orm\Model;

class Meal extends Model
{

    public static function getColumns(): array
    {
        return [
            'name' => [
                'type' => 'string',
                'required' => true,
                'unique' => true
            ],

            'description' => [
                'type' => 'string',
                'required' => false,
            ],

            'native_land' => [
                'type' => 'string',
                'required' => false,
            ],

            'chef_id' => [
                'type' => 'many2one',
                'foreign_object' => 'cooking\Chef',
                'required' => true,
            ],


            'mealcategories_ids' => [
                'type' => 'many2many',
                'foreign_object' => 'cooking\MealCategory',
                'foreign_field' => 'mealcategories_ids',
                'rel_table' => 'cooking_rel_meal_mealcategory',
                'rel_foreign_key' => 'mealcategory_id',
                'rel_local_key' => 'meal_id',
            ],

            'ingredients_ids' => [
                'type' => 'many2many',
                'foreign_object' => 'cooking\Ingredient',
                'foreign_field' => 'ingredients_ids',
                'rel_table' => 'cooking_rel_meal_ingredient',
                'rel_foreign_key' => 'ingredient_id',
                'rel_local_key' => 'meal_id',
            ],
        ];
    }
}
