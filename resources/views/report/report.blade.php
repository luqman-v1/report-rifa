<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="generator" content="LibreOffice 7.1.0.3 (MacOSX)" />
    <meta name="author" content="Rifa Muthia" />
    <meta name="created" content="2021-04-27T07:06:10" />
    <meta name="changed" content="2021-04-27T07:06:10" />
    <meta name="AppVersion" content="12.0000" />
    <meta name="Creator" content="Microsoft® Word 2019" />
    <style type="text/css">
        @page {
            size: 8.28in 11.69in;
            margin-left: 0.97in;
            margin-right: 0.6in;
            margin-top: 0.7in;
            margin-bottom: 0.65in
        }

        p.title {
            margin-top: 0.01in;
            margin-bottom: 0in;
            direction: ltr;
            line-height: 100%;
            text-align: left;
            orphans: 0;
            widows: 0;
            background: transparent
        }

        p.title1 {
             margin-top: 0.3in;
            background: transparent
        }

        p.title2 {
            margin-top: 0.01in;
            background: transparent
        }

        p.titleNoted {
            margin-top: -0.001in;
            margin-bottom: 0in;
            direction: ltr;
            line-height: 100%;
            text-align: left;
            orphans: 0;
            widows: 0;
            background: transparent
        }

        p.western {
            font-family: "Times New Roman", serif;
            font-size: 11pt;
            so-language: id
        }

        p.cjk {
            font-family: "Times New Roman", serif;
            font-size: 11pt;
            so-language: en-US
        }

        p.ctl {
            font-family: "Times New Roman";
            font-size: 11pt;
            so-language: ar-SA
        }

        span.line {
        display: inline-block;
        }
    </style>
</head>
@php
$c = Carbon\Carbon::parse($data->tanggal . " " . "00:00:00");
@endphp

<body lang="en-US" link="#000080" vlink="#800000" dir="ltr">

    <div title="header">
        <p class="title1">
        <div style="text-align: center;"><b>CATATAN KEGIATAN HARIAN PRAKTIK INDUSTRI</b></div>
        </p>
        <p class="title2">
        <div style="text-align: center;">(FORM.PI01)</div>
        </p>
    </div>
    <div id="TextSection" dir="ltr">
        <p lang="id" class="western" style="margin-top: 0in">
            <span class="sd-abs-pos" style="position: absolute; top: 7.55in; left: 1.58in; width: 142px"></span><br />
        </p>
        <p lang="id" class="western title" style="margin-top: 0.06in">
            Hari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $c->translatedFormat('l') }}
        </p>
        <p lang="id" class="western title" style="margin-top: 0.06in">
            Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $c->isoFormat('D MMMM Y') }}
        </p>
        <p lang="id" class="western title" style="margin-top: 0.06in">
            Lama Pelaksanaan : {{ $data->lama_pelaksana }} jam praktik
        </p>
        <p lang="id" class="western title" style="margin-top: 0in"><br />
        </p>
        <table width="100%" cellpadding="1" cellspacing="0">
            <tr valign="top">
                <td style="border: 0.5px solid #000000; padding: 0in 0in">
                    <p lang="id" align="center" style="margin-left: 0.06in; margin-right: 0.05in; margin-top: 0in; orphans: 0; widows: 0">
                        <font size="3" style="font-size: 11pt">No.</font>
                    </p>
                </td>
                <td style="border: 0.5px solid #000000; padding: 0in 0in">
                    <p lang="id" style="margin-left: 0.87in; margin-top: 0in; orphans: 0; widows: 0">
                        <font size="3" style="font-size: 11pt">Uraian Kegiatan</font>
                    </p>
                </td>
                <td style="border: 0.5px solid #000000; padding: 0in 0in">
                    <p lang="id" style="margin-left: 0.25in; margin-top: 0in; orphans: 0; widows: 0">
                        <font size="3" style="font-size: 11pt">Kuantitas</font>
                    </p>
                </td>
                <td style="border: 0.5px solid #000000; padding: 0in 0in">
                    <p lang="id" style="margin-left: 0.21in; margin-top: 0in; orphans: 0; widows: 0">
                        <font size="3" style="font-size: 11pt">Hasil</font>
                    </p>
                </td>
                <td style="border: 0.5px solid #000000; padding: 0in 0in">
                    <p lang="id" style="margin-left: 0.27in; margin-top: 0in; orphans: 0; widows: 0">
                        <font size="3" style="font-size: 11pt">Keterangan</font>
                    </p>
                </td>
            </tr>

            @foreach($data->kegiatan as $key => $v)
            <tr valign="top">
                <td height="16" style="border: 0.5px solid #000000;">
                    <p lang="id" align="center" style="margin-left: 0.06in; margin-right: 0.17in; margin-top: 0in; orphans: 0; widows: 0">
                        <font size="3" style="font-size: 11pt">{{ (int)$key+1 }}.</font>
                    </p>
                </td>
                <td style="border: 0.5px solid #000000;">
                    <p lang="id" style="margin-left: 0.04in; margin-top: 0in; orphans: 0; widows: 0">
                        <font size="3" style="font-size: 11pt">{{ $v }}</font>

                    </p>
                </td>
                <td style="border: 0.5px solid #000000;">
                    <p lang="id" style="margin-left: 0.04in; margin-top: 0in; orphans: 0; widows: 0">
                        <font size="3" style="font-size: 11pt">{{ $data->kuantitas[$key] }}</font>
                    </p>
                </td>
                <td style="border: 0.5px solid #000000;">
                    <p lang="id" style="margin-left: 0.04in; margin-top: 0in; orphans: 0; widows: 0">
                        <font size="3" style="font-size: 11pt">{{ $data->hasil[$key] }}</font>
                    </p>
                </td>
                <td style="border: 0.5px solid #000000;">
                    <p lang="id" style="margin-left: 0.04in; margin-top: 0in; orphans: 0; widows: 0">
                        <font size="3" style="font-size: 11pt">{{ $data->keterangan[$key] }}</font>
                    </p>
                </td>
            </tr>
            @endforeach
            @if(count($data->kegiatan) <= 10) @php $count=count($data->kegiatan);
                @endphp
                @while($count <= 9) <tr valign="top">
                    <td height="16" style="border: 0.5px solid #000000;">
                        <p lang="id" align="center" style="margin-left: 0.06in; margin-right: 0.17in; margin-top: 0in; orphans: 0; widows: 0">
                            <font size="3" style="font-size: 11pt">{{ $count+1 }}.</font>
                        </p>
                    </td>
                    <td style="border: 0.5px solid #000000;">
                        <p lang="id" style="margin-left: 0.04in; margin-top: 0in; orphans: 0; widows: 0">
                            <font size="3" style="font-size: 11pt"></font>

                        </p>
                    </td>
                    <td style="border: 0.5px solid #000000;">
                        <p lang="id" style="margin-left: 0.04in; margin-top: 0in; orphans: 0; widows: 0">
                            <font size="3" style="font-size: 11pt"></font>
                        </p>
                    </td>
                    <td style="border: 0.5px solid #000000;">
                        <p lang="id" style="margin-left: 0.04in; margin-top: 0in; orphans: 0; widows: 0">
                            <font size="3" style="font-size: 11pt"></font>
                        </p>
                    </td>
                    <td style="border: 0.5px solid #000000;">
                        <p lang="id" style="margin-left: 0.04in; margin-top: 0in; orphans: 0; widows: 0">
                            <font size="3" style="font-size: 11pt"></font>
                        </p>
                    </td>
                    </tr>
                    @php
                    $count += 1;
                    @endphp
                    @endwhile
                    @endif


        </table>
        <p lang="id" style="margin-top: 0.01in"><br />
        </p>
    </div>
    <table>
        <tr valign="top">
            <td width="334" height="10" style="border: none; padding: 0in">
                <p lang="id" style="margin-left: 0.14in; margin-top: 0in; orphans: 0; widows: 0">
                    <font size="3" style="font-size: 11pt">Mengetahui,</font>
                </p>
            </td>
        </tr>
        <tr valign="top">
            <td width="334" height="71" style="border: none; padding: 0in">
                <p lang="id" style="margin-left: 0.14in; margin-top: 0.06in; orphans: 0; widows: 0">
                    <font size="3" style="font-size: 11pt">Pembimbing Industri</font>
                </p>
            </td>
            <td width="213" style="border: none; padding: 0in">
                <p lang="id" style="margin-left: -0.50in; margin-top: 0.06in; orphans: 0; widows: 0">
                    <font size="3" style="font-size: 11pt">Yang Membuat,</font>
                </p>
            </td>
        </tr>
        <tr valign="top">
            <td width="334" height="40" style="border: none; padding: 0in">
                <p lang="id" style="margin-top: 0.01in; orphans: 0; widows: 0">
                    <br />
                </p>
                <p lang="id" style="margin-left: 0.14in; margin-top: -0.5in; orphans: 0; widows: 0">
                    <font size="3" style="font-size: 11pt;margin-left: 0in">(<b>Rr. Wara Dessiswatami</b>)</font>
                </p>
            </td>
            <td width="213" style="border: none; padding: 0in">
                <p lang="id" style="margin-top: -0.4in;margin-left: -0.4in; orphans: 0; widows: 0">

                    {{-- <img src="{{ asset('images/ttd.png') }}" width="90" height="50"> --}}
                </p>
                <p lang="id" style="margin-top: 0in; orphans: 0; widows: 0"><br />
                </p>
                <p lang="id" style="margin-left: -0.50in; margin-top: -0.5in; orphans: 0; widows: 0">
                    <font size="3" style="font-size: 11pt">(<b>Rifa Muthia</b>)</font>
                </p>
            </td>
        </tr>
    </table>

    <p class="titleNoted">Catatan : </p>
    <p class="titleNoted"><span>-&nbsp;&nbsp;&nbsp;</span>Uraian kegiatan diketik/ditulis dengan tangan setiap hari kegiatan;</p>
    <p class="titleNoted"><span>-&nbsp;&nbsp;&nbsp;</span>Kuantitas ditulis jumlah yang dikerjakan, <Hasil> ditulis kualitas pekerjaanya bagaimana (baik sekali, baik,
            cukup, atau kurang)
    </p>
    <p class="titleNoted"><span>-&nbsp;&nbsp;&nbsp;</span>Jika lebih dari 10 uraian kegiatan, kartu ini boleh digandakan;</p>
    <p class="titleNoted"><span>-&nbsp;&nbsp;&nbsp;</span>Kartu ini wajib dilampirkan pada laporan Praktik Industri; </p>
    <p class="titleNoted"><span>-&nbsp;&nbsp;&nbsp;</span>Jumlah jam setiap kegiatan dimasukkan pada kolom tanggal pada Matriks Kegiatan
        Praktik Industri (Form.PI02);</p>

        <p>
         <span class="line"></span>
        </p>
</body>

</html>