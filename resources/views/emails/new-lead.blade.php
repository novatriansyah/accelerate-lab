<x-mail::message>
# New Lead Received

**Name:** {{ $lead->name }}
**Email:** {{ $lead->email }}
**Company:** {{ $lead->company ?? 'N/A' }}
**Phone:** {{ $lead->phone ?? 'N/A' }}

**Message:**
{{ $lead->message }}

<x-mail::button :url="url('/admin/leads/' . $lead->id . '/edit')">
View in Admin Panel
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
