const state = {
    commentFields: {
        id: null,
        userId: null,
        username: null,
        avatar: null,
        text: null,
        likes_count: null,
        dislikes_count: null
    }
};
const getters = {
    getCommentFields: state => state.commentFields
};
const actions = {
    setId({ commit }, id) {
        commit({
            type: "setId",
            id: id
        });
    },
    setUserId({ commit }, userId) {
        commit({
            type: "setUserId",
            userId: userId
        });
    },
    setUsername({ commit }, username) {
        commit({
            type: "setUsername",
            username: username
        });
    },
    setAvatar({ commit }, avatar) {
        commit({
            type: "setAvatar",
            avatar: avatar
        });
    },
    setText({ commit }, text) {
        commit({
            type: "setText",
            text: text
        });
    },
    setLikes({ commit }, likes) {
        commit({
            type: "setLikes",
            likes: likes
        });
    },
    setDislikes({ commit }, dislikes) {
        commit({
            type: "setDislikes",
            dislikes: dislikes
        });
    }
};
const mutations = {
    setId(state, payload) {
        state.commentFields.id = payload.id;
    },
    setUserId(state, payload) {
        state.commentFields.userid = payload.userid;
    },
    setUsername(state, payload) {
        state.commentFields.username = payload.username;
    },
    setAvatar(state, payload) {
        state.commentFields.avatar = payload.avatar;
    },
    setText(state, payload) {
        state.commentFields.text = payload.text;
    },
    setLikes(state, payload) {
        state.commentFields.likes = payload.likes;
    },
    setDislikes(state, payload) {
        state.commentFields.dislikes = payload.dislikes;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
    namespaced: true
};
