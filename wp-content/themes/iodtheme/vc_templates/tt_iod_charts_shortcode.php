<?php

$title = $s_name =  $url = $color = $char_type = $cats = $name = $text_y = $suffix = $vertical_type = $s_data = $align_type = $layout_type = $border = '';


$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'highcharts' );
wp_enqueue_script( 'exporting' );

$group_val = json_decode(urldecode($atts['values']));
$init = uniqid();
$cats = str_replace(' ', '', $cats);
$catsArr = explode(",", $cats);

$prefix = 'pre_';
$rand = rand(9, 999).'_';
$uid = uniqid($prefix.$rand);

?>


<?php if($char_type == 'type_1') { ?>

<div class="cart-histori" id="<?php print esc_html($uid); ?>" ></div>

<script>
    /*-----------------------------------------------------------------------------------*/
    /* 		Monthly Average Temperature
     /*-----------------------------------------------------------------------------------*/
    jQuery(function () {
        jQuery('#<?php print esc_attr($uid); ?>').highcharts({
            title: {
                text: '<?php print esc_html($title); ?>',
                x: -20 //center
            },
            xAxis: {
                categories: <?php print json_encode($catsArr); ?>
            },
            yAxis: {
                title: {
                    text: '<?php print esc_html($text_y); ?>'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#fff'
                }]
            },
            tooltip: {
                valueSuffix: '<?php print esc_html($suffix); ?>'
            },
            legend: {
                layout: '<?php print esc_html($layout_type); ?>',
                align: '<?php print esc_html($align_type); ?>',
                verticalAlign: '<?php print esc_html($vertical_type); ?>',
                borderWidth: 0
            },
            series: [
                <?php foreach ($group_val as $val) {
                if(isset($val->name)) { ?>
                    {
                    name: '<?php print esc_html($val->name); ?>',
                        color: '<?php print esc_html($val->color); ?>',
                    data: [<?php print esc_html($val->s_data); ?>]
                    },
                <?php  } ?>
                <?php } ?>
            ]
        });
    });
</script>
<?php } ?>

<?php if($char_type == 'type_2') { ?>
    <div class="cart-histori" id="<?php print esc_html($uid); ?>"></div>
    <script>
        jQuery(function () {
            jQuery('#<?php print esc_html($uid); ?>').highcharts({
                chart: {
                    type: 'area'
                },
                title: {
                    text: '<?php print esc_html($title); ?>'
                },
                xAxis: {
                    categories: <?php print json_encode($catsArr); ?>
                },
                credits: {
                    enabled: false
                },
                series: [
                    <?php foreach ($group_val as $val) {
                    if(isset($val->name)) { ?>
                    {
                        name: '<?php print esc_html($val->name); ?>',
                        color: '<?php print esc_html($val->color); ?>',
                        data: [<?php print esc_html($val->s_data); ?>]
                    },
                    <?php  } ?>
                    <?php } ?>
                ]
            });
        });
    </script>
<?php } ?>




<?php if($char_type == 'type_3') { ?>
    <div class="cart-histori" id="<?php print esc_html($uid); ?>"></div>
<script>
    /*-----------------------------------------------------------------------------------*/
    /* 		Areaspline
     /*-----------------------------------------------------------------------------------*/
    jQuery(function () {
        jQuery('#<?php print esc_html($uid); ?>').highcharts({
            chart: {
                type: 'areaspline'
            },
            title: {
                text: '<?php print esc_html($title); ?>'
            },
            legend: {
                layout: '<?php print esc_html($layout_type); ?>',
                align: '<?php print esc_html($align_type); ?>',
                verticalAlign: '<?php print esc_html($vertical_type); ?>',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            xAxis: {
                categories: <?php print json_encode($catsArr); ?>,
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                    text: '<?php print esc_html($text_y); ?>'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: '<?php print esc_html($suffix); ?>'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [
                <?php foreach ($group_val as $val) {
                if(isset($val->name)) { ?>
                {
                    name: '<?php print esc_html($val->name); ?>',
                    color: '<?php print esc_html($val->color); ?>',
                    data: [<?php print esc_html($val->s_data); ?>]
                },
                <?php  } ?>
                <?php } ?>
            ]
        });
    });
</script>
<?php } ?>

<?php if($char_type == 'type_4') { ?>
<div class="cart-histori" id="<?php print esc_html($uid); ?>"></div>
<script>
    /*-----------------------------------------------------------------------------------*/
    /* 		Scatter
     /*-----------------------------------------------------------------------------------*/
    jQuery(function () {
        jQuery('#<?php print esc_html($uid); ?>').highcharts({
            chart: {
                type: 'scatter',
                zoomType: 'xy'
            },
            title: {
                text: '<?php print esc_html($title); ?>'
            },
            xAxis: {
                title: {
                    enabled: true,
                    text: 'Height (cm)'
                },
                startOnTick: true,
                endOnTick: true,
                showLastLabel: true
            },
            yAxis: {
                title: {
                    text: 'Weight (kg)'
                }
            },
            legend: {
                layout: '<?php print esc_html($layout_type); ?>',
                align: '<?php print esc_html($align_type); ?>',
                verticalAlign: '<?php print esc_html($vertical_type); ?>',
                x: 100,
                y: 70,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
                borderWidth: 1
            },
            plotOptions: {
                scatter: {
                    marker: {
                        radius: 5,
                        states: {
                            hover: {
                                enabled: true,
                                lineColor: 'rgb(100,100,100)'
                            }
                        }
                    },
                    states: {
                        hover: {
                            marker: {
                                enabled: false
                            }
                        }
                    },
                    tooltip: {
                        headerFormat: '<b>{series.name}</b><br>',
                        pointFormat: '{point.x} cm, {point.y} kg'
                    }
                }
            },
            series: [
                <?php foreach ($group_val as $val) {
                if(isset($val->name)) { ?>
                {
                    name: '<?php print esc_html($val->name); ?>',
                    color: '<?php print esc_html($val->color); ?>',
                    data: [<?php print esc_html($val->s_data); ?>]
                },
                <?php  } ?>
                <?php } ?>
            ]
        });
    });

</script>
<?php } ?>


<?php
if($char_type == 'type_5') { ?>
    <div class="cart-histori" id="<?php print esc_html($uid); ?>"></div>
    <script>
        jQuery(function () {
            jQuery.getJSON('<?php print esc_url($url); ?>', function (data) {

                jQuery('#usd-to-eur').highcharts({
                    chart: {
                        zoomType: 'x'
                    },
                    title: {
                        text: '<?php print esc_html($title); ?>'
                    },
                    subtitle: {
                        text: document.ontouchstart === undefined ?
                            'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                    },
                    xAxis: {
                        type: 'datetime'
                    },
                    yAxis: {
                        title: {
                            text: 'Exchange rate'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        area: {
                            fillColor: {
                                linearGradient: {
                                    x1: 0,
                                    y1: 0,
                                    x2: 0,
                                    y2: 1
                                },
                                stops: [
                                    [0, Highcharts.getOptions().colors[0]],
                                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                ]
                            },
                            marker: {
                                radius: 2
                            },
                            lineWidth: 1,
                            states: {
                                hover: {
                                    lineWidth: 1
                                }
                            },
                            threshold: null
                        }
                    },

                    series: [{
                        type: 'area',
                        name: '<?php print esc_html($s_name); ?>',
                        data: data
                    }]
                });
            });
        });
    </script>
<?php } ?>


<?php
if($char_type == 'type_6') { ?>
    <div class="cart-histori" id="<?php print esc_html($uid); ?>"></div>
    <script>
        /*-----------------------------------------------------------------------------------*/
        /* 		USD to EUR
         /*-----------------------------------------------------------------------------------*/
        jQuery(function () {
            jQuery.getJSON('<?php print esc_url($url); ?>', function (data) {
                var detailChart;

                jQuery(document).ready(function () {

                    // create the detail chart
                    function createDetail(masterChart) {

                        // prepare the detail chart
                        var detailData = [],
                            detailStart = data[0][0];

                        jQuery.each(masterChart.series[0].data, function () {
                            if (this.x >= detailStart) {
                                detailData.push(this.y);
                            }
                        });

                        // create a detail chart referenced by a global variable
                        detailChart = jQuery('#detail-container').highcharts({
                            chart: {
                                marginBottom: 120,
                                reflow: false,
                                marginLeft: 50,
                                marginRight: 20,
                                style: {
                                    position: 'absolute'
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            title: {
                                text: <?php print esc_html($title); ?>'
                            },
                            subtitle: {
                                text: 'Select an area by dragging across the lower chart'
                            },
                            xAxis: {
                                type: 'datetime'
                            },
                            yAxis: {
                                title: {
                                    text: null
                                },
                                maxZoom: 0.1
                            },
                            tooltip: {
                                formatter: function () {
                                    var point = this.points[0];
                                    return '<b>' + point.series.name + '</b><br/>' + Highcharts.dateFormat('%A %B %e %Y', this.x) + ':<br/>' +
                                        '1 USD = ' + Highcharts.numberFormat(point.y, 2) + ' EUR';
                                },
                                shared: true
                            },
                            legend: {
                                enabled: false
                            },
                            plotOptions: {
                                series: {
                                    marker: {
                                        enabled: false,
                                        states: {
                                            hover: {
                                                enabled: true,
                                                radius: 3
                                            }
                                        }
                                    }
                                }
                            },
                            series: [{
                                name: 'USD to EUR',
                                pointStart: detailStart,
                                pointInterval: 24 * 3600 * 1000,
                                data: detailData
                            }],

                            exporting: {
                                enabled: false
                            }

                        }).highcharts(); // return chart
                    }

                    // create the master chart
                    function createMaster() {
                        jQuery('#master-container').highcharts({
                            chart: {
                                reflow: false,
                                borderWidth: 0,
                                backgroundColor: null,
                                marginLeft: 50,
                                marginRight: 20,
                                zoomType: 'x',
                                events: {

                                    // listen to the selection event on the master chart to update the
                                    // extremes of the detail chart
                                    selection: function (event) {
                                        var extremesObject = event.xAxis[0],
                                            min = extremesObject.min,
                                            max = extremesObject.max,
                                            detailData = [],
                                            xAxis = this.xAxis[0];

                                        // reverse engineer the last part of the data
                                        $.each(this.series[0].data, function () {
                                            if (this.x > min && this.x < max) {
                                                detailData.push([this.x, this.y]);
                                            }
                                        });

                                        // move the plot bands to reflect the new detail span
                                        xAxis.removePlotBand('mask-before');
                                        xAxis.addPlotBand({
                                            id: 'mask-before',
                                            from: data[0][0],
                                            to: min,
                                            color: 'rgba(0, 0, 0, 0.2)'
                                        });

                                        xAxis.removePlotBand('mask-after');
                                        xAxis.addPlotBand({
                                            id: 'mask-after',
                                            from: max,
                                            to: data[data.length - 1][0],
                                            color: 'rgba(0, 0, 0, 0.2)'
                                        });


                                        detailChart.series[0].setData(detailData);

                                        return false;
                                    }
                                }
                            },
                            title: {
                                text: null
                            },
                            xAxis: {
                                type: 'datetime',
                                showLastTickLabel: true,
                                maxZoom: 14 * 24 * 3600000, // fourteen days
                                plotBands: [{
                                    id: 'mask-before',
                                    from: data[0][0],
                                    to: data[data.length - 1][0],
                                    color: 'rgba(0, 0, 0, 0.2)'
                                }],
                                title: {
                                    text: null
                                }
                            },
                            yAxis: {
                                gridLineWidth: 0,
                                labels: {
                                    enabled: false
                                },
                                title: {
                                    text: null
                                },
                                min: 0.6,
                                showFirstLabel: false
                            },
                            tooltip: {
                                formatter: function () {
                                    return false;
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            credits: {
                                enabled: false
                            },
                            plotOptions: {
                                series: {
                                    fillColor: {
                                        linearGradient: [0, 0, 0, 70],
                                        stops: [
                                            [0, Highcharts.getOptions().colors[0]],
                                            [1, 'rgba(255,255,255,0)']
                                        ]
                                    },
                                    lineWidth: 1,
                                    marker: {
                                        enabled: false
                                    },
                                    shadow: false,
                                    states: {
                                        hover: {
                                            lineWidth: 1
                                        }
                                    },
                                    enableMouseTracking: false
                                }
                            },

                            series: [{
                                type: 'area',
                                name: '<?php print esc_html($s_name); ?>',
                                pointInterval: 24 * 3600 * 1000,
                                pointStart: data[0][0],
                                data: data
                            }],

                            exporting: {
                                enabled: false
                            }

                        }, function (masterChart) {
                            createDetail(masterChart);
                        })
                            .highcharts(); // return chart instance
                    }

                    // make the container smaller and add a second container for the master chart
                    var $container = $('#cart-histori')
                        .css('position', 'relative');

                    jQuery('<div id="detail-container">')
                        .appendTo($container);

                    jQuery('<div id="master-container">')
                        .css({
                            position: 'absolute',
                            top: 300,
                            height: 100,
                            width: '100%'
                        })
                        .appendTo($container);

                    // create master and in its callback, create the detail chart
                    createMaster();
                });
            });
        });
    </script>
<?php } ?>
