@extends('layouts.factureMaster')

@section('contenu')

@foreach (explode(",", $infoFacture->tarification) as $index=> $tarif )

<tr>
    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #ff0000;  line-height: 18px;  vertical-align: top; padding:10px 0;"
        class="article">
        {{explode(",",$infoFacture->libtarif)[$index]}}
    </td>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
        <small>{{$tarif}}</small>
    </td>
    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
        align="center">{{explode(",",$infoFacture->quantites)[$index]}}</td>

    <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
        align="right">5788CFA</td>
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
        CFA
    </td>
</tr>
<tr>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
        Avance
    </td>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
        CFA{{$infoFacture->paiement}}
    </td>
</tr>
<tr>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
        Remise
    </td>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
        CFA
    </td>
</tr>

<tr>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
        <strong>Grand Total (Incl.Tax)</strong>
    </td>
    <td
        style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
        <strong>CFA {{$infoFacture->total}}</strong>
    </td>
</tr>
@endsection

