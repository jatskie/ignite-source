@php($updateVersionInfo = \IgniteCareers\Source\Functions\SourceUpdate::updateVersionInfo())
@php($sourceUpdateCompanySetting = \IgniteCareers\Source\Functions\SourceUpdate::companySetting())
<div class="table-responsive">

    <table class="table table-bordered">
        <thead>
        <th>@lang('modules.update.systemDetails')</th>
        </thead>
        <tbody>
        <tr>
            <td>App Version <span
                        class="pull-right">{{ $updateVersionInfo['appVersion'] }}</span></td>
        </tr>
        <tr>
            <td>Laravel Version <span
                        class="pull-right">{{ $updateVersionInfo['laravelVersion'] }}</span></td>
        </tr>
        <td>PHP Version
            @if (version_compare(PHP_VERSION, '7.1.0') > 0)
                <span class="pull-right">{{ phpversion() }} <i class="fa fa fa-check-circle text-success"></i></span>
            @else
                <span class="pull-right">{{ phpversion() }} <i  data-toggle="tooltip" data-original-title="@lang('messages.phpUpdateRequired')" class="fa fa fa-warning text-danger"></i></span>
            @endif
        </td>
        @if(!is_null($sourceUpdateCompanySetting->purchase_code))
            <tr>
                <td>Source Purchase code <span
                            class="pull-right">{{$sourceUpdateCompanySetting->purchase_code}}</span>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
