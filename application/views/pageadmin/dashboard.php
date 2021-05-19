			<!-- Main content -->
			<div class="content">
			    <div class="container-fluid">
			        <div class="row">
			            <div class="col-lg-6">
			                <div class="card">
			                    <div class="card-header border-0">
			                        <div class="d-flex justify-content-between">
			                            <h3 class="card-title">Total Request Per Month</h3>
			                            <a href="<?php echo base_url() . 'administrator/report' ?>">View Report</a>
			                        </div>
			                    </div>
			                    <div class="card-body">
			                        <div class="d-flex">
			                            <p class="d-flex flex-column">
			                                <!-- <span class="text-bold text-lg">Rp. 100.000</span> -->
			                                <!-- <span>Request per Month</span> -->
			                            </p>
			                        </div>
			                        <!-- /.d-flex -->
			                        <div class="position-relative mb-6">
			                            <div id="chartdiv" height="200"></div>
			                        </div>

                                    <div class="position-relative mb-6">
			                            <div id="chartdiv2" height="200"></div>
			                        </div>
			                    </div>
			                </div>
			                <!-- /.card -->
			            </div>
			            <!-- /.col-md-6 -->
			        </div>
			        <!-- /.row -->
			    </div>
			    <!-- /.container-fluid -->
			</div>
			<!-- /.content -->
			<!-- Resources -->
			<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
			<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
			<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

			<!-- Chart code -->
			<script>
			    am4core.ready(function() {

			        // Themes begin
			        am4core.useTheme(am4themes_animated);
			        // Themes end

			        // Create chart instance
			        var chart = am4core.create("chartdiv", am4charts.XYChart3D);

			        // Add data
			        chart.data = <?php echo json_encode($test); ?>

			        // Create axes
			        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
			        categoryAxis.dataFields.category = "month";
			        categoryAxis.renderer.grid.template.location = 0;
			        categoryAxis.renderer.minGridDistance = 30;

			        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			        valueAxis.title.text = "Total Request Per Month";
			        valueAxis.renderer.labels.template.adapter.add("text", function(text) {
			            return text;
			        });

			        // Create series
			        var series = chart.series.push(new am4charts.ColumnSeries3D());
			        series.dataFields.valueY = "value";
			        series.dataFields.categoryX = "month";
			        series.name = "Year 2017";
			        series.clustered = false;
			        series.columns.template.tooltipText = "Request in {categoryX} (<?php echo $tahun; ?>): [bold]{valueY}[/]";
			        series.columns.template.fillOpacity = 0.9;


			        var series2 = chart.series.push(new am4charts.ColumnSeries3D());
			        series2.dataFields.valueY = "value2";
			        series2.dataFields.categoryX = "month";
			        series2.name = "Year 2018";
			        series2.clustered = false;
			        series2.columns.template.tooltipText = "Request in {categoryX} (<?php echo $tahun; ?>): [bold]{valueY}[/]";
			    }); // end am4core.ready()
			</script>