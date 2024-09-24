<script>
// import { defineComponent } from 'vue'
import { QrcodeStream } from 'vue-qrcode-reader'


// export default {
//     components: {
//         QrcodeStream
//     },
//     methods: {
//         decode(decodeString) {
//             console.log(decodeString)
//         }
//     }
// }

export default {
    components: { QrcodeStream },

    data() {
        return {
            paused: false,
            result: '',
            showScanConfirmation: false
        }
    },

    methods: {
        onCameraOn() {
            this.showScanConfirmation = false
        },

        onCameraOff() {
            this.showScanConfirmation = true
        },

        onError: console.error,

        async onDetect(detectedCodes) {
            this.result = JSON.stringify(detectedCodes.map((code) => code.rawValue))
            console.log(this.result);

            this.paused = true
            await this.timeout(500)
            this.paused = false
        },

        timeout(ms) {
            return new Promise((resolve) => {
                window.setTimeout(resolve, ms)
            })
        }
    }
}

</script>

<template>
<!--    <QrcodeStream></QrcodeStream>-->
<!--    <qrcode-stream @decode="decode"></qrcode-stream>-->

    <p class="decode-result">
        Last result: <b>{{ result }}</b>
    </p>

    <qrcode-stream
        :paused="paused"
        @detect="onDetect"
        @camera-on="onCameraOn"
        @camera-off="onCameraOff"
        @error="onError"
    >
        <div
            v-show="showScanConfirmation"
            class="scan-confirmation"
        >
            DONE IMG
        </div>
    </qrcode-stream>

</template>

<style scoped>
.scan-confirmation {
    position: absolute;
    width: 100%;
    height: 100%;

    background-color: rgba(255, 255, 255, 0.8);

    display: flex;
    flex-flow: row nowrap;
    justify-content: center;
}
</style>