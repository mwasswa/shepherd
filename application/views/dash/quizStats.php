<!-- Initialisations for the graph-->
<script type="text/javascript">
    $(function () {
        $('#percentagePass').highcharts({
            data: {
                table: 'info'
            },
            chart: {
                type: 'column' /*Chart types:: pie, column, line*/
            },
            title: {
                text: 'Percentage Pass per question'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Percentage pass'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });

   
    });

</script>
<legend><font class="myColor"><i class="fa fa-dashboard"></i>Dashboard</font></legend>
<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url() ?>/index.php/dash/dashBoard"><-Back</a>
       <!--<a href="<?php echo base_url() ?>/index.php/dash/getQuizPerSubject/<?php echo $myidz;?>">Back</a>-->

    </div>
</div>
<div class="row">
    <div class="col-lg-12" id="percentagePass">

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive table-bordered table-striped" id="info">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Percentage pass</th>
                </tr>
            </thead>
            <tbody>
                 <?php 
                 $info = json_decode($counts);
                 $count = count($info);
                 for($i = 0; $i<$count; $i++){ ?>
                <tr>
                    <td><?php echo $info[$i]->{'question'};//$info[$i]['question'];?></td>
                    <td><?php echo $info[$i]->{'passRate'};//$info[$i]['question'];?></td>
                </tr>
              <?php   }
                 ?>
            </tbody>
        </table>
       
    </div>
</div>
