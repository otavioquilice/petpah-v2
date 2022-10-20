<?php
namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ong extends Model
{
	use SoftDeletes;
    use Uuid;
	protected $table = "ongs";
	protected $fillable = [

		"uuid",
		"ativo",
		"razao_social",
		"nome_fantasia",
		"cnpj",
		"estatuto_social",
		"nome_representante_legal",
		"email_representante_legal",
		"telefone_representante_legal",
		"created_at",
        "updated_at",
        "deleted_at",

	];

}
