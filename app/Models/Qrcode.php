<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Qrcode",
 *      required={"user_id","company_name","product_name","callback_url","amount"},
 *      @OA\Property(
 *          property="website",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="company_name",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="product_name",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="product_url",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="callback_url",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="qrcode_path",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="amount",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="number",
 *          format="number"
 *      ),
 *      @OA\Property(
 *          property="status",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="boolean",
 *      ),
 *      @OA\Property(
 *          property="deleted_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */class Qrcode extends Model
{
    public $table = 'qrcodes';

    public $fillable = [
        'user_id',
        'website',
        'company_name',
        'product_name',
        'product_url',
        'callback_url',
        'qrcode_path',
        'amount',
        'status'
    ];

    protected $casts = [
        'website' => 'string',
        'company_name' => 'string',
        'product_name' => 'string',
        'product_url' => 'string',
        'callback_url' => 'string',
        'qrcode_path' => 'string',
        'amount' => 'float',
        'status' => 'boolean'
    ];

    public static array $rules = [
        'user_id' => 'required',
        'website' => 'nullable|string|max:255',
        'company_name' => 'required|string|max:255',
        'product_name' => 'required|string|max:255',
        'product_url' => 'nullable|string|max:255',
        'callback_url' => 'required|string|max:255',
        'qrcode_path' => 'nullable|string|max:255',
        'amount' => 'required|numeric',
        'status' => 'nullable|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Transaction::class, 'qrcode_id');
    }
}
