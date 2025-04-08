<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EnqQuotesProof extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'enq_quotes_proofs';
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'email',
        'mobile',
        'address',
        'city',
        'state',
        'zip',
        'project_type',
        'paper_type',
        'numbered',
        'books',
        'finished_size',
        'side_count',
        'quantity',
        'print_position',
        'ink_color',
        'sku_number',
        'additional_information',
        'upload_files',
        'clipped_corner',
        'reenforced_holes',
        'tag_ties',
        'status',
    ];
}
