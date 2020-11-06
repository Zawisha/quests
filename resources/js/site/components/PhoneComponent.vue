<template>
    <input
        type="tel"
        name="phone"
        pattern ="8 \([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}"
        autocomplete="off"
        placeholder="8 (000) 000-00-00"
        v-mask="'9 (999) 999-99-99'"
        required
    >
</template>

<script>
    import AwesomeMask from 'awesome-mask';

    export default {
        directives: {
            'mask': AwesomeMask
        },
    }
</script>
