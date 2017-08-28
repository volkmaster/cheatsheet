export function numberProp (required = true) {
    return {
        type: Number,
        required: required
    }
}

export function booleanProp (required = true) {
    return {
        type: Boolean,
        required: required
    }
}

export function objectProp (required = true) {
    return {
        type: Object,
        required: required
    }
}

export function stringProp (required = true) {
    return {
        type: String,
        required: required
    }
}

export function arrayProp (required = true) {
    return {
        type: Array,
        required: required
    }
}

export function functionProp (required = true) {
    return {
        type: Function,
        required: required
    }
}
