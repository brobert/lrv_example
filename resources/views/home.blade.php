@extends('layouts._landerv2_blank')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="ico-quotes-left mr5"></i> Primary</h3>
                </div>
                <!--/ panel heading/header -->

                <!-- panel body with collapse capable -->
                <div class="panel-collapse pull out">
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, mei essent everti theophrastus an, accusam lucilius vis eu. In mei accusamus efficiendi mediocritatem, eos ex paulo complectitur.
                    </div>
                </div>
                <!--/ panel body with collapse capabale -->
            </div>
        </div>




        <div class="col-md-6">
            <div class="panel panel-default">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="ico-quotes-left mr5"></i> Primary</h3>
                    <!-- panel toolbar -->
                    <div class="panel-toolbar text-right">
                        <!-- option -->
                        <div class="option">
                            <button class="btn refresh demo" data-toggle="panelrefresh"><i class="reload"></i></button>
                            <button class="btn up" data-toggle="panelcollapse"><i class="arrow"></i></button>
                            <button class="btn" data-toggle="panelremove" data-parent=".col-md-4"><i class="remove"></i></button>
                        </div>
                        <!--/ option -->
                    </div>
                    <!--/ panel toolbar -->
                </div>
                <!--/ panel heading/header -->

                <!-- panel body with collapse capable -->
                <div class="panel-collapse pull out">
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, mei essent everti theophrastus an, accusam lucilius vis eu. In mei accusamus efficiendi mediocritatem, eos ex paulo complectitur.
                    </div>
                </div>
                <!--/ panel body with collapse capabale -->

                <!-- Loading indicator -->
                <div class="indicator"><span class="spinner"></span></div>
                <!--/ Loading indicator -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <pre>
                {{ print_r( $user, true) }}
            </pre>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <pre>
                {{ print_r( $this_methods, true) }}
            </pre>
        </div>


    </div>
</div>
@endsection
