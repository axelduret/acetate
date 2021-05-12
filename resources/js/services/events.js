import { Service } from "./service";

class EventsService extends Service {
    constructor() {
        super();
    }
    fetchData(item) {
        this.$data.events = null;
        this.overlay = true;
        if (item === "all") {
            this.query = "events?per_page=";
        } else {
            this.query = "events?taxonomy_type=" + this.item + "&per_page=";
        }
        axios
            .request({
                url: this.query + this.perPage,
                method: "get",
                baseURL: "/api/",
                headers: {
                    Authorization: "Bearer " + this.apiToken
                }
            })
            .then(response => {
                this.events = response.data.events;
            })
            .catch(error => {
                console.log(error);
            })
            .finally(() => {
                this.overlay = false;
                console.log(this.$vue);
                console.log(this.$vue.router);
                console.log(this.$router);
                return this.events;
            });
    }
}
export default new EventsService();
