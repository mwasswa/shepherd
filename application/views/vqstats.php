<html>
    <head>
        <script type="text/javascript" src="<?php echo base_url('assets/js/js/highcharts.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/js/modules/data.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/js/modules/exporting.js'); ?>"></script>
        <script type="text/javascript">
            $(function () {
                $('#container').highcharts({
                    data: {
                        table: 'datatable'
                    },
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Questions Per Subject'
                    },
                    yAxis: {
                        allowDecimals: false,
                        title: {
                            text: 'Number of Questions'
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

            $(function () {
                $('#container_topics').highcharts({
                    data: {
                        table: 'datatable_topics'
                    },
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Questions Per Topic'
                    },
                    yAxis: {
                        allowDecimals: false,
                        title: {
                            text: 'Number of Questions'
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

            $(function () {
                $('#container_gen').highcharts({
                    data: {
                        table: 'datatable_gen'
                    },
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Combined Stats'
                    },
                    yAxis: {
                        allowDecimals: false,
                        title: {
                            text: 'Number of Questions'
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
    </head>
    <body>
        <!--<div id="container" style="width:100%; height:400px;"></div>-->

        <?php
        /*
          $stats = $this->mqueries->get_subject_querries_count();
          if (is_array($stats) && count($stats)) {
          $table = "<table id='datatable' class='table table-striped table-hover table-bordered'>"
          . "<thead><tr>";
          foreach ($stats as $subject => $count) {
          $table .= "<th>$subject</th>";
          }
          $table .= "</tr><tbody><tr>";

          foreach ($stats as $subject => $count) {
          $table .= "<td>$count</td>";
          }

          $table .= "</tr></tbody></table>";
          echo $table;


          } */
        ?>
        <!--<div id="container_topics" style="width:100%; height:400px;"></div>-->
        <?php
        /*
          $topic_stats = $this->mqueries->get_topic_querries_count();
          if (is_array($topic_stats) && count($topic_stats)) {
          $table_topics = "<table id='datatable_topics' class='table table-striped table-hover table-bordered'>"
          . "<thead><tr>";
          foreach ($topic_stats as $topic => $count) {
          $table_topics .= "<th>$topic</th>";
          }
          $table_topics .= "</tr><tbody><tr>";

          foreach ($topic_stats as $topic => $count) {
          $table_topics .= "<td>$count</td>";
          }

          $table_topics .= "</tr></tbody></table>";
          }

          echo $table_topics;
         */
        ?>
        <div class="col-lg-12 bpm-bottom">
            <?php
            if (strlen($success)) {
                echo "<div class='alert alert-success col-lg-12'>$success</div>";
            } elseif (strlen($failure)) {
                echo "<div class='alert alert-danger col-lg-12'>$failure</div>";
            } else {
                echo '';
            }
            ?>
        </div>
        <div class="col-lg-12 bpm-bottom">
            <div class="col-lg-12">
                <fieldset>
                    <legend><font class="myColor"><i class="fa fa-filter"></i> Filter  Question Statistics</font></legend>
                    <form class="form-inline" role="form" method="POST">
                        <div class="form-group margin-10">
                            <input type="text" class="form-control" id="email" placeholder="Class" name="stat_class"/>
                        </div>
                        <div class="form-group margin-10">
                            <!--<label for="pwd">Password:</label>-->
                            <input type="text" class="form-control" id="pwd" placeholder="Year" name="stat_year"/>
                        </div>
                        <div class="form-group margin-10">
                            <!--<label for="pwd">Password:</label>-->
                            <input type="text" class="form-control" id="pwd" placeholder="Term" name="stat_term"/>
                        </div>
                        <div class="margin-10">
                            <input type="submit" class="btn btn-primary" value = "Filter" name="stat_filter_btn"/>
                        </div>
                    </form>
                </fieldset>
            </div>
            <div class="col-lg-12" id="container_gen" style="width:100%; height:400px;"></div>
        </div>



        <?php
        //$source = $this->mqueries->get_querries_count($this->session->userdata('current_year'),$this->session->userdata('current_term'));
        //var_dump($source);exit;

        //$source = $this->session->userdata("source");
        $padded = array();

        // array of all the topics
        $all_topics = array();
        foreach ($source as $subject) {
            $all_topics = array_merge($all_topics, array_keys($subject));
        }

        array_multisort($all_topics);

        foreach ($source as $subject => $topics) {
            // get the topics in this subject
            $subject_topics = array_keys($topics);
            // get the topics that are not in this subject
            $missing_topics = array_filter($all_topics, function($stack) use ($subject_topics) {
                return !in_array($stack, $subject_topics);
            });
            // create an array of the missing topics with null values assigned
            $missing_topics_assoc = array_fill_keys($missing_topics, null);
            // merge the missing topics and the subject topics and add entry to destination
            $padded[$subject] = array_merge($topics, $missing_topics_assoc);
            ksort($padded[$subject]);
        }
        //print_r($padded);

        $table_gens = "<table id='datatable_gen' class='table table-striped table-hover table-bordered'>"
                . "<thead><tr><th></th>";
        foreach ($all_topics as $k => $topic) {
            $table_gens .= "<th>$topic</th>";
        }
        $table_gens .= "</tr></thead><tbody>";

        foreach ($padded as $qsubject => $data) {
            $table_gens .= "<tr><td>$qsubject</td>";
            foreach ($data as $topic => $count) {
                for ($i = 0; $i < count($all_topics); $i++) {
                    if (trim($all_topics[$i]) == trim($topic)) {
                        if ($count > 0) {
                            $table_gens .= "<td>$count</td>";
                        } else {
                            $table_gens .= "<td>$count</td>";
                        }
                    }
                }
            }
            $table_gens .= "</tr>";
        }
        $table_gens .= "</tbody></table>";
        echo $table_gens;
        ?>
    </body>
</html>

