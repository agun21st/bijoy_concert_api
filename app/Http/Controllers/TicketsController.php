<?php

namespace App\Http\Controllers;

use App\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TicketsController extends Controller
{
    public function getTicketHolders()
    {
        // return "Hello World!";

        for ($page = 1; $page <= 250; $page++) {
            $response = Http::get('https://aristocratbd.com/wp-json/wp/v2/bijoy_api/?per_page=100&page='.$page);
            // $checkStatus = Concert::create([
            //     '' =>
            // ])
            // $res = $gallery->request('GET','https://aristocratbd.com/wp-json/wp/v2/bijoy_api/?per_page=1&page=1');
            // $data = json_decode($res->getBody()->getContents(), true);
            if($response){
                $tickets = json_decode($response, false);
                // $myArray = array();
                // $myArray[] = $ticket->id;
                foreach ($tickets as $ticket) {
                    Concert::create([
                        'ticket_id' => $ticket->id,
                        'date'  => $ticket->date,
                        'date_gmt' => $ticket->date_gmt,
                        'modified' => $ticket->modified,
                        'modified_gmt' => $ticket->modified_gmt,
                        'slug' => $ticket->slug,
                        'status' => $ticket->status,
                        'type' => $ticket->type,
                        'link' => $ticket->link,
                        'author' => $ticket->author,
                        'template' => $ticket->template,
                        'ovaem_ticket_code' => $ticket->ovaem_ticket_code,
                        'ticket_status' => $ticket->ticket_status,
                        'ovaem_ticket_buyer_name' => $ticket->ovaem_ticket_buyer_name,
                        'ovaem_ticket_buyer_email' => $ticket->ovaem_ticket_buyer_email,
                        'ovaem_ticket_buyer_phone' => $ticket->ovaem_ticket_buyer_phone,
                        'ovaem_ticket_buyer_address' => $ticket->ovaem_ticket_buyer_address,
                        'ovaem_ticket_buyer_company' => $ticket->ovaem_ticket_buyer_company,
                        'ovaem_ticket_buyer_gate' => $ticket->ovaem_ticket_buyer_gate,
                        'ovaem_ticket_buyer_desc' => $ticket->ovaem_ticket_buyer_desc,
                        'ovaem_ticket_event_name' => $ticket->ovaem_ticket_event_name,
                        'ovaem_pdf_ticket_logo' => $ticket->ovaem_pdf_ticket_logo,
                        'ovaem_ticket_event_id' => $ticket->ovaem_ticket_event_id,
                        'ovaem_ticket_package_id' => $ticket->ovaem_ticket_package_id,
                        'ovaem_ticket_info_link' => $ticket->ovaem_ticket_info_link,
                        'ovaem_ticket_info_password' => $ticket->ovaem_ticket_info_password,
                        'ovaem_ticket_event_package' => $ticket->ovaem_ticket_event_package,
                        'ovaem_ticket_event_start_time' => $ticket->ovaem_ticket_event_start_time,
                        'ovaem_ticket_event_end_time' => $ticket->ovaem_ticket_event_end_time,
                        'ovaem_ticket_event_venue' => $ticket->ovaem_ticket_event_venue,
                        'ovaem_ticket_event_address' => $ticket->ovaem_ticket_event_address,
                        'ovaem_ticket_from_order_id' => $ticket->ovaem_ticket_from_order_id,
                        'ovaem_ticket_verify' => $ticket->ovaem_ticket_verify,
                        '_wp_old_slug' => $ticket->_wp_old_slug,
                        '_edit_lock' => $ticket->_edit_lock,
                        '_wp_trash_meta_status' => $ticket->_wp_trash_meta_status,
                        '_wp_trash_meta_time' => $ticket->_wp_trash_meta_time,
                        '_wp_desired_post_slug' => $ticket->_wp_desired_post_slug,
                    ]);
                }
                // return response()->json(['success' => $res], 200);
            }else{
                return response()->json(['Data not found' => $res], 200);
            }
        }

        return "Data inserted on db";

    }

    public function getAllTicketHolders(Request $request){
        $getAllTicketHolders = Concert::paginate($request->per_page);
        if($getAllTicketHolders){
            return response()->json(['getAllTicketHoldersList' => $getAllTicketHolders], 200);
        }else{
            return response()->json(['getAllTicketHolders' => "Ticket not found!"], 200);
        }
    }

    public function getSingleTicketInfo($code){
        $getTicket = Concert::where('ovaem_ticket_code',$code)->first();
        if($getTicket)
        {
            return response()->json(['getSingleTicketInfo' => $getTicket], 200);
        }else{
            return response()->json(['getSingleTicketInfo' => "Ticket not found!"], 200);
        }
    }
    public function checkTicketStatus($code){
        $getTicket = Concert::where('ovaem_ticket_code',$code)->first();
        if($getTicket)
        {
            return response()->json(['getTicketStatus' => $getTicket->ticket_status, 'ovaem_ticket_code' => $getTicket->ovaem_ticket_code], 200);
        }else{
            return response()->json(['getTicketStatus' => "Ticket not found!"], 200);
        }
    }

    public function updateTicketStatus($code){
        $getTicket = Concert::where('ovaem_ticket_code',$code)->first();
        if($getTicket){
            if($getTicket->ticket_status == "checked_in")
            {
                return response()->json(['getTicketStatus' => "Already checked_in"], 200);
            }else{
                $getTicket->update([
                    "ticket_status" => "checked_in",
                ]);
                return response()->json(['getTicketStatus' => $getTicket->ticket_status, 'ovaem_ticket_code' => $getTicket->ovaem_ticket_code, 'success' => "ok"], 200);
            }
        }else{
            return response()->json(['getTicketStatus' => "Ticket not found!"], 200);
        }
    }

    public function updateTicketStatusToNotCheckedIn($code){
        $getTicket = Concert::where('ovaem_ticket_code',$code)->first();
        if($getTicket){
            if($getTicket->ticket_status == "checked_in")
            {
                $getTicket->update([
                    "ticket_status" => "not_checked_in",
                ]);
                return response()->json(['getTicketStatus' => $getTicket->ticket_status, 'ovaem_ticket_code' => $getTicket->ovaem_ticket_code, 'success' => "ok"], 200);
            }else{
                return response()->json(['getTicketStatus' => "Already not_checked_in"], 200);
            }
        }else{
            return response()->json(['getTicketStatus' => "Ticket not found!"], 200);
        }
    }
}
