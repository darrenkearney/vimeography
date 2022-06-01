<script>
    const LoopControls = {
        script: [
            // vimeography loop control ui
            { type: 'text/javascript', src: './wp-content/uploads/loop-control.js', async: true, body: true }, // Insert in body,
            { type: 'text/javascript', src: 'https://code.jquery.com/jquery-3.6.0.min.js', async: true, body: true, crossorigin: "anonymous", integrity:"sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" }
        ]
    }
    export default LoopControls;
</script>

<template>
    <div class="loopcontrols text-center row-eq-height video-controls-container vimeo_loop flex-column">
        <div class="col-md-12 vimeo-playback-controls-container flex-item flex-column ">
            <input class="slider vimeo-playback-slider" type="range" min="0" max="100" value="0" id="vimPlayback">
        </div>
        <div class="col-md-12 flex-row">
            <div class="col-md-6 vimeo-playback-rate-slider-container flex-item flex-column ">
                <div class="playback-speed-readout-container">
                    <div class="title" title="Playback speed">
                        Luas seinnte: <span id="vimSpeed">100</span>%
                    </div>
                </div>
                <div class="playback-speed-readout-container vc_btn3-container">
                    <input class="slider vimeo-playback-rate-slider" type="range" min="50" max="150" value="100" id="vimRange">
                    <button
                        class="harvestone-color-2-bg vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-grey btn-speed-reset"
                        title="Reset"
                        id="vimFullSpeed">Athshocraigh
                    </button>
                </div>
            </div>
            <div class="col-md-6 vimeo-loop-controls-container flex-item text-center vc_btn3-container vc_btn3-inline ">
                <div class="col-md-12 loop-title title" title="Loop">Lúb</div>
                <div class="flex-row">
                    <button class="harvestone-color-2-bg vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-grey" id="getVimStartTime" onclick="" title="<?php echo __('Start', 'harvestone'); ?>">
                        <i class="fa fa-right-from-line"></i> Tús
                    </button>&nbsp;
                    <button class="harvestone-color-2-bg vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-grey" id="getVimEndTime" onclick="" title="<?php echo __('End', 'harvestone'); ?>">
                        <i class="fa fa-left-from-line"></i> Críoch
                    </button>&nbsp;
                    <button class="harvestone-color-2-bg vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-grey" id="clearVimLoop" onclick="" title="<?php echo __('Clear', 'harvestone'); ?>">
                        <i class="fa fa-trash-can"></i> Glan
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    .video-controls-container {
        background: linear-gradient(0deg, #222749, #000000);
        color: #ffffff;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        padding: 12px 18px 8px;
        position: relative;
        width: 100%;
        margin-top: -1px;
    }

    .video-controls-container .flex-row {
        flex-direction: row;
        display: flex;
        width: 100%;
        justify-content: space-evenly;
    }

    .video-controls-container .flex-item {
        flex-grow: 1;
    }

    .vimeo-playback-controls-container {
        width: 100%;
        padding: 1em 0;
    }

    .harvestone-color-1-bg,
    .video-controls-container .harvestone-color-1-bg,
    .harvestone-color-1-bg.vc_general.vc_btn3 {
        background-color: #EF6B24;
        color: white;
    }

    .harvestone-color-2-bg,
    .video-controls-container .harvestone-color-2-bg,
    .harvestone-color-2-bg.vc_general.vc_btn3 {
        /*background-color: #323D6B;*/
        /*background-color: #EF6B24;*/
        background-color: #018184;
        color: white;
        font-size: 100%;
        /*margin-left: 1em;*/
        padding: 2px 16px;
    }

    .vimeo-playback-rate-slider {
        width: 100%;
    }

    .video-controls-container .col-12.g-py-10.text-center.vc_btn3-container.vc_btn3-inline {
        margin-bottom: 12px;
    }

    .playback-speed-readout-container {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    .video-controls-container .title {
        display: block;
        width: 100%;
        padding: 10px 0;
    }

    /*.vimeo-playback-rate-slider-container {*/
    /*    border-right: 2px solid rgba(150,150,150,0.5) ;*/
    /*}*/

    /*
    * Playback position controls
    * ----------------------------------------------------------------------------
    */

    input#vimPlayback[type=range]{
        -webkit-appearance: none;
        width: 90%;
        background: transparent; /* Otherwise white in Chrome */
        cursor: pointer;
        --range: calc(var(--max) - var(--min));
        --ratio: calc((var(--value) - var(--min)) / var(--range));
        /*--sx: calc(0.5 * 10px + var(--ratio) * (100% - 10px));*/
        --sx: calc( var(--ratio) * (100%) );
    }

    input#vimPlayback[type=range]:focus {
        outline: none;
    }

    input#vimPlayback[type=range]::-webkit-slider-thumb {
        width: 10px;
        height: 10px;
        border-radius: 1em;
        background: #EB738E;
        border: none;
        box-shadow: 0 0 2px black;
        margin-top: calc(3px * 0.5 - 10px * 0.5);
        -webkit-appearance: none;
    }

    input#vimPlayback[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 8px;
        border: none;
        border-radius: 3px;
        background: #efefef;
        border: none;
        box-shadow: none;
    }

    input#vimPlayback[type=range]::-webkit-slider-thumb:hover {
        background: #ef6b24;
    }
    /* nieem new code for control */
    input#vimPlayback[type=range]::-webkit-slider-thumb {
        background: pink !important;
    }
    input#vimPlayback[type=range]{
        background:#ef6b24 !important;
    }

    /* nieem new code for control end */

    input#vimPlayback[type=range]:hover::-webkit-slider-runnable-track {
        background: #e5e5e5;
    }

    input#vimPlayback[type=range]::-webkit-slider-thumb:active {
        background: #ef6b24;
    }

    input#vimPlayback[type=range]:active::-webkit-slider-runnable-track {
        background: #f5f5f5;
    }

    input#vimPlayback[type=range]::-webkit-slider-runnable-track {
        background: linear-gradient(#ef6b24,#ef6b24) 0/var(--sx) 100% no-repeat, #efefef;
    }

    input#vimPlayback[type=range]:hover::-webkit-slider-runnable-track {
        background: linear-gradient(#ef6b24,#ef6b24) 0/var(--sx) 100% no-repeat, #e5e5e5;
    }

    input#vimPlayback[type=range]:active::-webkit-slider-runnable-track {
        background: linear-gradient(#ef6b24,#ef6b24) 0/var(--sx) 100% no-repeat, #f5f5f5;
    }

    /*
    input#vimPlayback[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 8px;
        background: #ef6b24;
        background: linear-gradient(#ef6b24,#ef6b24) 0/var(--sx) 100% no-repeat, #ddd;
        border: none;
        border-radius: 3px;
    }
    */
    input#vimPlayback[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #ef6b24;
        margin-top: -4px;
    }

    input#vimPlayback[type=range]:focus {
        outline: none;
    }

    input#vimPlayback[type=range]:focus::-webkit-slider-runnable-track {
        background: #ef6b24;
    }

    /*input#vimPlayback[type=range]{*/
    /*    !* fix for FF unable to apply focus style bug  *!*/
    /*    border: 1px solid white;*/

    /*    !*required for proper track sizing in FF*!*/
    /*    width: 90%;*/
    /*}*/

    input#vimPlayback[type=range]::-moz-range-track {
        width: 100%;
        height: 8px;
        background: #777;
        border: none;
        border-radius: 3px;
    }

    input#vimPlayback[type=range]::-moz-range-progress {
        background: #ef6b24;
    }

    input#vimPlayback[type=range]::-moz-range-thumb {
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #ef6b24;
    }

    /*hide the outline behind the border*/
    input#vimPlayback[type=range]:-moz-focusring {
        outline: 1px solid transparent;
        outline-offset: -1px;
    }

    input#vimPlayback[type=range]:focus::-moz-range-track {
        background: #ef6b24;
    }

    input#vimPlayback[type=range]::-ms-track {
        width: 10%;
        height: 8px;

        /*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
        background: transparent;

        /*leave room for the larger thumb to overflow with a transparent border */
        border-color: transparent;
        border-width: 6px 0;

        /*remove default tick marks*/
        color: transparent;
    }

    input#vimPlayback[type=range]::-ms-fill-lower {
        background: #ef6b24;
        border-radius: 10px;
    }

    input#vimPlayback[type=range]::-ms-fill-upper {
        background: #ddd;
        border-radius: 10px;
    }

    input#vimPlayback[type=range]::-ms-thumb {
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #ef6b24;
    }

    input#vimPlayback[type=range]:focus::-ms-fill-lower {
        background: #ef6b24;
    }

    input#vimPlayback[type=range]:focus::-ms-fill-upper {
        background: #ddd;
    }

    /*
    * Playback rate controls
    * ----------------------------------------------------------------------------
    */

    button#vimFullSpeed {
        background: #EB738E;
    }

    input#vimRange[type=range]{
        -webkit-appearance: none;
        width: 40%;
        margin-right: 1em;
        background: transparent; /* Otherwise white in Chrome */
    }

    input#vimRange[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 8px;
        background: #EB738E;
        border: none;
        border-radius: 3px;
    }

    input#vimRange[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #EB738E;
        margin-top: -4px;
    }

    input#vimRange[type=range]:focus {
        outline: none;
    }

    input#vimRange[type=range]:focus::-webkit-slider-runnable-track {
        background: #EB738E;
    }

    /*input#vimRange[type=range]{*/
    /*    !* fix for FF unable to apply focus style bug  *!*/
    /*    border: 1px solid white;*/

    /*    !*required for proper track sizing in FF*!*/
    /*    width: 90%;*/
    /*}*/

    input#vimRange[type=range]::-moz-range-track {
        width: 100%;
        height: 8px;
        background: #777;
        border: none;
        border-radius: 3px;
    }

    input#vimRange[type=range]::-moz-range-progress {
        background: #EB738E;
    }

    input#vimRange[type=range]::-moz-range-thumb {
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #EB738E;
    }

    /*hide the outline behind the border*/
    input#vimRange[type=range]:-moz-focusring {
        outline: 1px solid transparent;
        outline-offset: -1px;
    }

    input#vimRange[type=range]:focus::-moz-range-track {
        background: #ddd;
    }

    input#vimRange[type=range]::-ms-track {
        width: 10%;
        height: 8px;

        /*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
        background: transparent;

        /*leave room for the larger thumb to overflow with a transparent border */
        border-color: transparent;
        border-width: 6px 0;

        /*remove default tick marks*/
        color: transparent;
    }

    input#vimRange[type=range]::-ms-fill-lower {
        background: #ddd;
        border-radius: 10px;
    }

    input#vimRange[type=range]::-ms-fill-upper {
        background: #EB738E;
        border-radius: 10px;
    }

    input#vimRange[type=range]::-ms-thumb {
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #EB738E;
    }

    input#vimRange[type=range]:focus::-ms-fill-lower {
        background: #ddd;
    }

    input#vimRange[type=range]:focus::-ms-fill-upper {
        background: #EB738E;
    }
</style>