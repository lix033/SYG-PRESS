@extends('layouts.factureMaster')

@section('contenu')

@foreach ($infotarifs as $index=>$tarifinfo)

<tr>
    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #ff0000;  line-height: 18px;  vertical-align: top; padding:10px 0;"
        class="article">
        {{$tarifinfo->libtarif}}
    </td>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
        <small>{{$tarifinfo->prixtarif}}</small>
    </td>
    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
        align="center">
   
        {{ $ligneFactures[$index]->quantites }}
   </td>

    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
        align="right">{{ $tarifinfo->prixtarif*$ligneFactures[$index]->quantites }}</td>
</tr>
<tr>
    <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
</tr>
    
@endforeach

@endsection

@section('calculs')
<tr>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
        Sous total
    </td>
    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;"
        width="80">
        CFA {{ $total }}
    </td>
</tr>
<tr>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
        Avance
    </td>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
        CFA {{$ligneFactures->first()->avance}}
    </td>
</tr>
<tr>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
        Remise
    </td>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
        CFA {{$ligneFactures->first()->remise}}
    </td>
</tr>

<tr>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
        <strong>Grand Total (Incl.Tax)</strong>
    </td>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
        <strong>CFA {{$total-($ligneFactures->first()->remise+$ligneFactures->first()->avance)}}</strong>
    </td>
</tr>
@endsection

