
<script>
    export default {
        render: function (createElement) {
            const self = this;
            return  createElement(
                'div',
                {
                    class: {
                        'form-field': true,
                        'has-error': this.error
                    }
                },
                [
                    createElement(
                        'span',
                        {
                            class: 'form-field-error'
                        },
                        this.error
                    ),
                    createElement(
                        'input', {
                            attrs: {
                                type: this.type,
                                name: this.name,
                                placeholder: this.placeholder,
                                required: this.required,
                            },
                            domProps: {
                                value: this.value
                            },
                            on: {
                                input: function (event) {
                                    self.$emit('input', event)
                                }
                            }
                        }
                    )
                ]
            );
        },
        props: [
            'type',
            'value',
            'name',
            'placeholder',
            'required',
            'error'
        ]
    }
</script>