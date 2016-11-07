$(document).ready(function() {  

//Displays the total number of clicks per file uploaded indicating the number of times that file has been read. 

                $('#fileCount').highcharts({
                    data: {
                        table: 'fileClicks'
                    },
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'File Clicks'
                    },
                    yAxis: {
                        allowDecimals: false,
                        title: {
                            text: 'Total number of clicks'
                        }
                    },
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.series.name + '</b><br/>' +
                                    this.point.y + ' ' + this.point.name.toLowerCase();
                        }
                    }
                });
          

}