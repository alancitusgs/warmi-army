(function($) {
				"use strict";
				$.getJSON("lang/json", function(data) {
				    var options = {
		              type: 'line',
		              data: {
		                labels: [data.jan, data.feb, data.mar, data.apr, data.may, data.jun,
		                		data.jul, data.aug, data.sep, data.oct, data.nov, data.dic],
		                datasets:
		                [
		                    {
		                      fill: true,
		                      borderColor:"#0984e3",
		                      backgroundColor:"#11cdef",
		                      data : data.chart_monthly
		                    }
		                ]
		              },
		              options: {
		                responsive: true,
		                maintainAspectRatio: false,
		                legend: {
		                    display: false
		                },
		                tooltips: {
		                    callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.yLabel;
		                        }
		                    }
		                },
		                scales: {
		                    xAxes: [{
		                        display: true,
		                    }],
		                    yAxes: [{
		                        display: true,
		                        ticks: {
		                            beginAtZero: true
		                        },
		                        scaleLabel: {
		                            display: true,
		                            labelString: data.quantities
		                        }
		                    }]
		                }
		              }
		            }
            		var ctx = document.getElementById('chart-activities').getContext('2d');
            		new Chart(ctx, options);
				});
			})(jQuery);