<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $table = 'concerts';

    protected $fillable = [
        'ticket_id',
        'date',
        'date_gmt',
        'modified',
        'modified_gmt',
        'slug',
        'status',
        'type',
        'link',
        'author',
        'template',
        'ovaem_ticket_code',
        'ticket_status',
        'ovaem_ticket_buyer_name',
        'ovaem_ticket_buyer_email',
        'ovaem_ticket_buyer_phone',
        'ovaem_ticket_buyer_address',
        'ovaem_ticket_buyer_company',
        'ovaem_ticket_buyer_gate',
        'ovaem_ticket_buyer_desc',
        'ovaem_ticket_event_name',
        'ovaem_pdf_ticket_logo',
        'ovaem_ticket_event_id',
        'ovaem_ticket_package_id',
        'ovaem_ticket_info_link',
        'ovaem_ticket_info_password',
        'ovaem_ticket_event_package',
        'ovaem_ticket_event_start_time',
        'ovaem_ticket_event_end_time',
        'ovaem_ticket_event_venue',
        'ovaem_ticket_event_address',
        'ovaem_ticket_from_order_id',
        'ovaem_ticket_verify',
        '_wp_old_slug',
        '_edit_lock',
        '_wp_trash_meta_status',
        '_wp_trash_meta_time',
        '_wp_desired_post_slug',
    ];

    public function ticket()
    {
        // return $this->belongsTo(Department::class, 'department_id')->select('id', 'name');
    }
}
