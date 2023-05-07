function listing(url,refid)
{
    oTable = $(refid).dataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            dataType: 'json',
            url: url,
            method: "POST",
        },
    });
}

