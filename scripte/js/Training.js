class Training
{
    constructor(team_players)
    {
        //DB()->create_player_array()
        this._team_players = team_players;
    }

    get team_players()
    {
        return this._team_players;
    }

    set_property_to_number(number, property, value)
    {
        this._team_players[this.id_by_number(number)][0][property] = value;
    }

    id_by_number(number)
    {
        const json_data = this._team_players;
        const arr = Object.keys(json_data).map((key) => [key, json_data[key]]);
        let id = null;
        arr.forEach(function(item/*, index, arr*/)
        {
            if(number === item[1][0]["nummer"])
            {
                id = item[0];
            }
        });
        return id;
    }

    get_value_of_number(number, value)
    {
        return this._team_players[this.id_by_number(number)][0][value];
    }

}