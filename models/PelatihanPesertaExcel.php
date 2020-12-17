<?php
namespace app\models;

class PelatihanPesertaExcel extends \yii\db\ActiveRecord
{
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => ['xlsx', 'xls']],
        ];
    }
}
