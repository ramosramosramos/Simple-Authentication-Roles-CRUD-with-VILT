import {ref} from 'vue'
 const isChange=ref(false);
export function useNav(){
    return {
        isChange,
        change:(()=>isChange.value=!isChange.value),
        hide:(()=>isChange.value=false)
    }
}
