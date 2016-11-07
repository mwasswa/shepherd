<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/
?>
<!-- Initialisations for the graph-->
<script type="text/javascript">
    $(function () {
        $('#fileCount').highcharts({
            data: {
                table: 'fileClicks'
            },
            chart: {
                type: 'line' /*Chart types:: pie, chart, line*/
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

        $('#fileClicks').hide();
    });
</script>

<legend><font class="myColor"><i class="fa fa-dashboard"></i>Dashboard</font></legend>

<!-- End initioalisations for the graph -->
<!--<div class="row">
    <div class="col-md-12" id="fileCount">
        <h1>Hi Charts view for the number of clicks per file</h1>
    </div>
</div> -->
<div class="row">    
                <div class="row">
                    <div class="col-md-12 col-xs-12" id="subjects" style="margin-left: 90px;">
                        <?php foreach ($subjects as $subject) {?>
                        <div class="col-md-3 wrapper my_margin">
                            <h3><?php echo strtoupper($subject->name);?></h3>
                            <ul class="list-unstyled ">
                                <li>
                                    <a href="<?php echo base_url();?>/index.php/dash/getQuizPerSubject/<?php echo $subject->id?>">Quiz Percentage pass</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>/index.php/dash/studentTeacherQuestions/<?php echo $subject->id?>">Student teacher questions</a>
                                </li>
                            </ul>

                        </div>
                            <?php }?>
                    </div>

                </div>
            </div>
<!--
<div class="row">
    <div class="col-md-12">
        <table id='fileClicks' class='table table-striped table-hover table-bordered'>
            <thead>
            <th>Document Name</th>
            <th>Number of Clicks</th>
            </thead>
            <tbody>
                <?php foreach($totalCountsPerFile as $count) {?>
                <tr>
                    <td><?php echo $count->upload;?></td>
                    <td><?php echo $count->clicked;?></td>
                </tr>
                    <?php }?>
            </tbody>
        </table>

    </div>

</div>
-->
