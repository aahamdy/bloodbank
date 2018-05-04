$(document).ready(function () {
    $('#example').DataTable();
});

$(function () {

    var url = window.location.pathname,
        urlRegExp = new RegExp(url.replace(/\/$/, '') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
    // now grab every link from the navigation
    $('.side-nav li a').each(function () {
        // and test its normalized href against the url pathname regexp
        if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
            $(this).parent('li').addClass('active');
        }
    });

});


function adstypes(type) {
    if (type == "banner") {
        $("#typeoption").html('<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Advertiser Name<span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input class="form-control col-md-7 col-xs-12" name="advertiser_name" placeholder="e.g CodeCannyon" type="text"></div></div><div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"> Advertise Banner <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input type="file" accept="image/*" name="banner" id="uploadFile" required/></div></div><div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Redirect URL <span class="required">*</span><p class="small-label">e.g. http://geniusocean.com</p></label><div class="col-md-6 col-sm-6 col-xs-12"><input class="form-control col-md-7 col-xs-12" name="redirect_url" placeholder="e.g. http://geniusocean.com" required type="text"></div></div>');
    } else if (type == "script") {
        $("#typeoption").html('<div class="item form-group"> <label class="control-label col-md-3 col-sm-3 col-xs-12" for="script">Ad Script <span class="required">*</span> <p class="small-label">Google Adsense or Others</p> </label> <div class="col-md-6 col-sm-6 col-xs-12"> <textarea class="form-control col-md-7 col-xs-12" name="script" placeholder="Paste Your Ad Script Here.." required></textarea> </div> </div>');
    } else {
        $("#typeoption").html('');
    }
}

function uploadclick() {
    $("#uploadFile").click();
    $("#uploadFile").change(function (event) {
        $("#uploadTrigger").html($("#uploadFile").val());
    });
}

////////////////////////Google Chart///////////////////////////

google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Blood Type', 'Quantity'],
        ['A+', 9],
        ['A-', 2],
        ['B+', 4],
        ['B-', 4],
        ['AB+', 2],
        ['AB-', 1],
        ['O+', 3],
        ['O-', 8]
    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {
        'title': 'Bloods Quantity',
        'width': 670,
        'height': 400,
        is3D: true
    };

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}

////////////////////////Column Chart///////////////////////////

window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "Blood Quantity"
        },
        axisY: {
            labelFontSize: 25,
            labelFontColor: "dimGrey"
        },
        axisX: {
            labelAngle: -30,
            labelFontSize: 20
        },
        data: [{
            indexLabelFontSize: 25,
            indexLabelFontFamily: "Lucida Console",
            indexLabelFontColor: "orangered",
            type: "column",
            indexLabelPlacement: "outside",
            dataPoints: [{
                    y: 9,
                    label: "A+",
                    indexLabel: "9"
                },
                {
                    y: 2,
                    label: "A-",
                    indexLabel: "2"
                },
                {
                    y: 4,
                    label: "B+",
                    indexLabel: "4"
                },
                {
                    y: 4,
                    label: "B-",
                    indexLabel: "4"
                },
                {
                    y: 2,
                    label: "AB+",
                    indexLabel: "2"
                },
                {
                    y: 1,
                    label: "AB-",
                    indexLabel: "1"
                },
                {
                    y: 3,
                    label: "O+",
                    indexLabel: "3"
                },
                {
                    y: 8,
                    label: "O-",
                    indexLabel: "8"
                }
            ]
        }]
    });

    chart.render();
}