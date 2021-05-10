<html>
<head>
    <style type="text/css" media="print">
        div.page {
            page-break-after: always;
            page-break-inside: avoid;
        }
    </style>
<head>
<body>
    @foreach($pages as $page)
    <div class="page">
        {!! html_entity_decode($page) !!}
    </div>
    @endforeach
</body>
</html>