@extends('common.default')

@section('title', 'About Page')

@section('css')
    <style>
        html, body {
            margin-top:0;
        }
        .accent {
            margin-top: 50px;
            text-align: center;
        }
    </style>
@endsection

@section('content')

    @include('common.header')

    <div className="info" class="about container-fluid d-flex align-items-center">
        <div class="row mt-5">
            <div class="col">
                <div class="row">
                    <h1 class="accent">The Southface Equity Evaluator</h1>
                </div>
                <div class="row text-left mb-5">
                    <h3>In 2015, Southface and the TransFormation Alliance (TFA) developed the Equity Evaluator Tool to better contextualize and shape transit-oriented development (TOD) proposals to have a more focused lens on equity and the specific needs of neighborhoods and communities surrounding current and future transit. The Tool was developed with significant engagement with partners working in community development, policy and planning, and transit, as well as market stage and typology research from Reconnecting America and local partners. The Tool is based on a robust analysis of neighborhood and community indicators related to area-median income, job access, walkability and more to create a set of station typologies based upon current conditions and needs to preserve and enhance the affordability, sustainability and connectivity of development.</h3>
                </div>

                <div class="row">
                    <h1 class="accent">Southface Institute</h1>
                </div>
                <div class="row text-left mb-5">
                    <h3>
                        <a href=https://www.southface.org>Southface Institute,</a>
                        a nonprofit 501(c)(3) organization, is a leader in sustainable advocacy, building, planning and operations across the U.S. With a mission to create a healthy and equitably built environment for all, Southface’s consulting services, workforce development, research and policy practices are supporting better homes, workplaces and communities. Experts in the fields of resource efficiency, building tech and organizational sustainability since 1978, Southface is committed to building a regenerative economy to meet tomorrow’s needs today.
                    </h3>
                </div>

                <div class="row">
                    <h1 class="accent">The TransFormation Alliance</h1>
                </div>
                <div class="row text-left mb-5">
                    <h3>
                        The
                        <a class="link" href=https://atltransformationalliance.org>TransFormation Alliance</a>
                        is a collaboration of community advocates, policy experts, transit providers and government agencies that believes equitable transit-oriented development can promote community building practices to link communities near transit stations with the opportunities they need to thrive.
                    </h3>
                </div>
            </div>
        </div>

    </div>


@endsection
